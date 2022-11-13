<?php
	include("config.php");
	session_start();
    if(!isset($_SESSION)) 
    { 
    session_start(); 
	$_SESSION['name'] = "";
    } 
	unset($_SESSION['username']);

		if(isset($_SESSION['cart_products'])) {
		$total_cart = count($_SESSION['cart_products']); }
	else {
		$total_cart = 0;
	}
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
	<title>Admin Login - MyDapoq</title>
</head>
<body>
<header>
	<?php include('nav-top.php'); ?>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">
	<div class="login">
		<form class="login" method="POST" action="product_add.php">
			<div class="input">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input">
				<label>Password</label>
				<input type="password" name="pass">
			</div>
			<div class="input">
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>