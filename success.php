<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['cart_products'])) {
		$total_cart = count($_SESSION['cart_products']); }
	else {
		$total_cart = 0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/icon.png" />
	<title>Success! - MyDapoq</title>
</head>
<body>
<header>
<div class="nav-top">
	<?php include('nav-top.php'); ?>
</div>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Admin Login</h2><hr>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<?php include('login_popup.php') ?>
		</div>
	</div>
</div>
	<?php include('cart_item.php'); ?>
<div class="container">
	<div class="success">
		<h4> Please complete the payment and your order will be proceed soon!<p> Thank you for shopping with us!</p></h4>
		<a href="index.php">Continue</a>
	</div> 
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>