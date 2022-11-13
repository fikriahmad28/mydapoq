<?php

$db_name = "cart";
$db_server = 'localhost';
$db_username = 'root';
$db_password = 'root';

$currency = 'RM';

$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if(mysqli_connect_errno()) // kalau ada connection error
	echo 'Fail to connect:'.mysql_connect_error(); // bagitau apa error

?>