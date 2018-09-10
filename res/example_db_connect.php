<?php

// Insert the hostname, username, password, database and remove the 'example_' prefix from the filename


$db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD);
$db->select_db(DB_DATABASE);


 ?>
