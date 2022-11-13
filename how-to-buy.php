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
	<title>How To Buy - MyDapoq</title>
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

	<h4>How to buy from MyDapoq online store?</h4>
	<img src="images/how-to-buy.png">
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>