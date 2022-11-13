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
	<title>Privacy &amp; Policy - MyDapoq</title>
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
	<h3>Return Policy</h3>

	<h4>14 days Return or Exchange Policy</h4>
	<h5>If you are NOT 100% satisfied with your purchase for any reason, we will gladly accept returns of packages within 14 days of the order date and issue a full refund.</h5>

	<h5>All we ask is that the product is...
	<ul>
		<li>not used</li>
		<li>in the same condition you received it</li>
		<li>in the original box and / or packaging</li>
	</ul></h5>

	<h5>We value your shopping experience on top of everything else, that's why we also accept exchange (for item of equal or lesser value) if the item does not live up to your expectation or any other reasons beyond our wildest imagination.</h5>

	<h5>However, this does not apply to the sale or clearance items in which we have already mentioned no refund nor return. Also, we cannot extend this return policy to resellers of our product.</h5>

	<h4>Return or Exchange Procedures</h4>
	<h5>Please request for return or exchange by emailing us at info.mydapoq@yahoo.com within 14 days from the day order is received.</h5>

	<h5>You have to include the following details in the email:
	<ul>
		<li>Order no:</li>
		<li>Contact no:</li>
		<li>Product to return or exchange:</li>
		<li>Reason for return or exchange (so that we can improve!):</li>
	</ul></h5>

	<h5>Once we receive your request for return or exchange, we shall contact you within 3 business days for further instructions. To exchange item, please let us know the item you like to have in exchange.</h5>

	<h5>In most cases, you will need to bear the shipping charges for returning the item to us. However, if we send the wrong or defective items to you, we will bear all the cost of return shipping (as long as you use a standard shipping method) and we will make sure we send the correct items to you, ALL at our expense.</h5>

	<h5>Once your return is received and inspected by us (usually within 72 hours of receipt), your refund will be processed and we will contact you to arrange the refund.</h5>

	<h5>Just don't forget that before you ship anything back to us, please email info.mydapoq@yahoo.com first so that we can provide you with complete return instructions.</h5>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>