<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Test site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
		<script src="res/tools.js"></script>

  </head>
	<body>

    <div class="container-fluid">

		<h1>Test site</h1>


        <?php
		include("res/menu.php");

    require("db_connect.php");

    if (isset($_GET['start'])){
      $start = $_GET['start'];
    } else {
      $start = 0;
    }
    $result = array();

    /// LIMIT 10 OFFSET ?
    $query = $db->prepare("SELECT user, created, message, image_url  FROM guestbook  ");
    //$query->bind_param("i", $start);
    $query->bind_result($result['user'], $result['created'], $result['message'], $result['image_url']);
    $query->execute();

    echo '<table class="table table-bordered"><thead><tr><th>Username</th><th>Date</th><th>Message</th><th>Image</th></tr></thead><tbody>';


    while ($query->fetch()){
      //echo $result['user'] . " " . $result['created'] . " " .$result['message'] . $result['image_url'] . "<br /> ";
      echo '<tr>';
      echo '<td>'. $result['user'].'</td>';
      echo '<td>'. $result['created'].'</td>';
      echo '<td>'. $result['message'].'</td>';
      //echo '<td>'. $result['image_url'].'</td>';
      if ($result['image_url'] !== ''){
        echo '<td><img src="'.$result['image_url'].'" alt="'.$result['image_url'].'" title="'.$result['image_url'].'" ></td>';
      }

      echo '</tr>';
    }
    echo '</tbody></table>';

    if (isset($_SESSION['AccessToken'])){
      $client = require(__DIR__ . '/res/bootstrap.php');
      $username = $client->verifyAccessToken($_SESSION['AccessToken']);

      echo 'Hello ' . $username;

      ?>
      <form action="res/input.php" method="POST"  enctype="multipart/form-data"/>
          <textarea name="message" ></textarea>
          <br />
          <input type="file" name="file" /><br />
          <input type="submit" value="Submit"/>
          <input type="reset" value="Reset" />
      </form>

      <?php

    } else {
      echo 'Please log in to post messages';
    }
    ?>










  </div>

  <script>
      feather.replace()
    </script>
	</body>
</html>
