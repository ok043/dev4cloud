<?php
session_start();

$message = $_POST['message'];

$client = require(__DIR__ . '/bootstrap.php');
$config = require("config.php");

require('db_connect.php');
require("../vendor/autoload.php");

use Aws\S3\S3Client;

$s3 = new Aws\S3\S3Client($config);

if (isset($_SESSION['AccessToken'])){
  $username = $client->verifyAccessToken($_SESSION['AccessToken']);

  if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $file = $_FILES['file']["tmp_name"];


    // Check if provided file is an image file
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $info = finfo_file($finfo, $file);
    $infos = explode("/", $info);
    if ($infos[0] == "image"){
      $result = $s3->putObject(array(
        'Bucket'     => 'dev4cloud-guestbook-images',
        'Key'        => uniqid() . $filename,
        'SourceFile' => $file
      ));
      $bucket_location = $result['ObjectURL'];

      // Insert the "-resized" suffix to the the bucket URL
      $parts = explode(".", $bucket_location);
      $parts[0] = $parts[0] . "-resized";
      $bucket_location = implode(".",$parts);

      $query = $db->prepare("INSERT INTO guestbook (user, created, message, image_url) VALUES (?, NOW(), ?, ?)");
      $query->bind_param("sss", $username, $message, $bucket_location);
      $query->execute();

    }
  } else {
    $query = $db->prepare("INSERT INTO guestbook (user, created, message, image_url) VALUES (?, NOW(), ?, NULL)");
    $query->bind_param("ss", $username, $message);
    $query->execute();
  }

  $query->close();
  header("Location: ../guestbook.php");
} else {
  echo 'Not logged in <a href="../guestbook.php">Return</a>';
}

 ?>
