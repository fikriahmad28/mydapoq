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
	<title>About Us - MyDapoq</title>
</head>
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
<div class="container">
	<?php include('cart_item.php'); ?>
	<div class="section-contact">
	<h3>Who Are We?</h3>
	<label>MyDapoq is a shop which supplies kitchen equipment and electrical equipment such as pans, pots, ovens and rice cookers.</label>

	<h3>Location? </h3>
	<label>The store is located at No 21 &amp; 22 Jalan Tunku Abidah, 09000 Kulim, Kedah.</label>
	<img src="images/map-location.png" title="MyDapoq Location">

	<h3>Business Hours:</h3>
	<label>Monday - Friday: 10am - 10pm</label>
	<label>Weekends and Public Holidays: 9am - 9pm</label>

	<h3>Our Mission</h3>
	<label>MyDapoq aims to provide Malaysian audience with an innovative and exciting ways to shop, hassle-free in the convenience of their homes or even at anywhere, anytime. This is being executed by engaging with the audience via a new immersive world of shoppertainment, showcasing good quality products while demonstrating features that make these products suitable for our Malaysian lifestyle.</label>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>