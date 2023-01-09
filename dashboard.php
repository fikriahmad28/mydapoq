<?php
	session_start();
	include ('config.php');

	if(!isset($_SESSION['username'])) // direct access
	header('location: login.php?e=true'); // goto login

	// category
	$query_category = 'SELECT * FROM category';
	$result_category = mysqli_query($conn, $query_category) or die (mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/icon.png" />
	<title>Dashboard - MyDapoq</title>
</head>
<body>
<header>
	<?php include('nav-top.php'); ?>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">

<div class="cart-view-table-back">
	<h3 align="center"><img src="images/icon-add.png" style="width: 20px"> Dashboard</h3>
	</div>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>