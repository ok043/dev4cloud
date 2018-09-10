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



		?>
    <form method="POST" action="res/registering.php" class="loginField" id="registerForm">
    <table>
    <tr><td>Username: </td>
          <td><input type="text" name="username" id="RegUsername" maxlength="30" class="loginField"/></td>
        </tr>
    <tr>
          <td>Email: </td>
            <td><input type="email" name="email" id="RegEmail" maxlength="50"  class="loginField"/></td>
        </tr>
    <tr>
          <td>Password: </td>
            <td><input type="password" name="password"  id="RegPassword" class="loginField"/></td></tr>
    <tr>
          <td>Confirm Password: </td>
            <td><input type="password" name="passwordConfirm" id="RegPasswordConfirm"  class="loginField"/></td>
        </tr>
    <tr>
          <td><input type="reset" value="Reset" class="loginField" /></td>
            <td><input type="submit" value="Submit" id="RegSubmit" class="loginField" /></td>
        </tr>
    </table>
    </form>
		<p id="error1">Passwords don't match</p>
		<p id="error2">Password too short</p>
		<p id="error3">Password does not contain uppercase letters</p>
		<p id="error4">Password does not contain lowercase letters</p>
		<p id="error5">Password does not contain special letters</p>
		<p id="error6">Password does not contain numbers</p>
		<p id="success1">Registration successful. Please click the verification link sent to your email address</p>
  </div>

  <script>
      feather.replace()
    </script>
	</body>
<html>
