<?php
use pmill\AwsCognito\CognitoClient;
use pmill\AwsCognito\Exception\ChallengeException;
use pmill\AwsCognito\Exception\PasswordResetRequiredException;

/** @var CognitoClient $client */
$client = require(__DIR__ . '/bootstrap.php');

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $authenticationResponse = $client->authenticate($username, $password);
} catch (\Exception $e){
  echo('Error');
}

if (isset($authenticationResponse['AccessToken'])) {
  session_start();
	session_regenerate_id();
  $_SESSION['AccessToken'] = $authenticationResponse['AccessToken'];
  $_SESSION['RefreshToken'] = $authenticationResponse['RefreshToken'];
  $_SESSION['IdToken'] = $authenticationResponse['IdToken'];
  session_write_close();
	echo('Login');
} else {
  echo('Error');
}

?>
