<?php
include("config.php");
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
if($result)
	header("location: product_list.php");
?>