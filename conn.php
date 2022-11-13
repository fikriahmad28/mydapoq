<?php

$conn = mysql_connect("localhost", "root", "");

if(!$conn) // jika connection gagal
{
	die("Connection Fail");
}

$db = mysql_select_db("cart", $conn);

?>