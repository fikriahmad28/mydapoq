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
	<title>Payment - MyDapoq</title>
</head>
<body>
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
	<h4>What are the payment method available?</h4>
	We support the following payment options :-
	<ul>
		<li>Online Transfer</li>
		<li>Bank In</li>
	</ul>

	<h4>Which banks do MyDapoq support?</h4>
	<ul>
		<li>Maybank: MyDapoq Store 701-569-820-459</li>
		<li>CIMB: MyDapoq Store 75-18963459-7</li>
	</ul>

	<h4>Where can I request an official receipt?</h4>
		<label>MyDapoq’s official receipts are usually attached with the item in the parcel. However, in the event if you did not receive the receipt for the item, please send your request to <a href="contact-us.php">HERE</a> and read our <a href="privacy-policy.php">Privacy &amp; Policy</a>. We will assist you right away.
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>