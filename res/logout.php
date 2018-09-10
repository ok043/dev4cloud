<?php
session_start();

session_unset();

session_destroy();

header("Location: ../index.php");
exit();

?>
<a href="index.php">Get back</a>
