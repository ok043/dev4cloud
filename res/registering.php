<?php

$client = require(__DIR__ . '/bootstrap.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

try {
  $client->registerUser($username, $password, [
      'email' => $email,
  ]);
} catch (\Exception $e){
  echo "Error";
}
echo "Confirmed";

?>
