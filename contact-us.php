<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['cart_products'])) {
		$total_cart = count($_SESSION['cart_products']); }
	else {
		$total_cart = 0;
	}
	$query_category = 'SELECT * FROM category';
	$result_category = mysqli_query($conn, $query_category) or die (mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/icon.png" />
	<title>Contact Us - MyDapoq</title>
</head>
<header>
	<?php include('nav-top.php'); ?>
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
<div class="container">
	<?php include('cart_item.php'); ?>
	<div class="section-contact">
		<h3>For more info, kindly call our company at</h3>

		<h4>Contact No:</h4>
		<label>04-490 3717</label>

		<h4>Faks:</h4>
		<label>04-495 4612</label>

		<h4>E-mail:</h4>
		<label>info.mydapoq@yahoo.com</label>

		<h4>You can call us during our working hours:</h4>
		<label>Monday - Friday: 10am - 10pm</label>
		<label>Weekends and Public Holidays: 9am - 9pm</label>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>