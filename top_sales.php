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
	<title>MyDapoq - Your Kitchen's Expert</title>
</head>
<body>
<div class="admin_log">
	<li><a class="admin-button" href="about.php"><img src="images\icon-about.png">ABOUT US</a></li>
	<li><a class="admin-button" href="#popup2"><img src="images\icon-cart.png"><?php echo "($total_cart)"; ?></a></li>
	<li><a class="admin-button" href="#popup1"><img src="images\icon-user.png">LOGIN</a></li>
</div>
<header>
	<?php include('header.php') ?>
	<div class="search">
	<!--<form method="POST" action="index.php">
		<input name="search" placeholder="Search >>">
		</form>	 -->
	</div>
</header>
<nav>
	<ul>
		<li><a href="index.php"><img src="images\icon-home-active.png"></a></li>
		<li><a href="payment.php">Categories</a></li>
		<li><a class="active" href="payment.php">Top Sales</a></li>
		<li><a href="payment.php">How To Pay</a></li>
	</ul>
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
<!-- 	<?php
		// $output = "";
		// if(isset($_POST['search'])) {
		// 	$searchq = $_POST['search']; // query
		// 	$searchq = preg_replace("#[0-9a-z]#i", "", $searchq);
		// }
	?> -->
<div class="container">
	<!-- SENARAI PRODUK -->
	<ul class="products">
	<?php 
		$query = 'SELECT * FROM products';
		$result = mysqli_query($conn, $query); 

		// $querysearch = "SELECT * FROM products WHERE prodcut_name LIKE '%$searchq$'";
		// $resultsearch = mysqli_query($querysearch);

		// $querysearch_total = "SELECT * FROM products WHERE product_name LIKE '%$searchq'";
		// $total_result = mysqli_query($querysearch_total);

		// $total_record = mysqli_num_rows($total_result);

		// while ($row = mysql_fetch_array($resultsearch)) {

		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
	?>
		<li>
			<form method="POST" action="update_cart.php">
				<div>
					<button type="submit" class="add_to_cart" >Add To Cart</button>
				</div>
				<a href="product.php?id=<?php echo $row['id'];?>">
				<div class="product_photo">
					<img src="images/<?= $row['product_photo'] ?>" width="90%" />
				</div>
				<div class="product_name">
					<h4><?= $row['product_name'] ?></h4>
				</div>
				</a>
				<div class="product_info">
					<label>
						<span>Price:</span>
						<span class="price"><?= $currency.number_format($row['product_price'], 2) ?></span>
					</label>
					<fieldset>
					<label>
						<span>Quantity:</span>
						<select maxLength="2" name="product_quantity"/>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>25</option>
							<option>50</option>
							<option>100</option>
						</select>
						<!-- <input type="text" size="2" maxLength="2" name="product_quantity" value="1" /> -->
					</label>
					</fieldset>
						<input type="hidden" name="type" value="add" />
						<input type="hidden" name="product_id" value="<?= $row['id']; ?>" />

				</div>
			</form>
		</li>
	<?php		
	}	
		// } 
		// if ($total_record == 0) {
		// 	$output = 'No product found.'
		// }
	}
	else
		echo 'Tiada senarai produk';
	?>
	</ul>
<!-- 	<h2><?php echo $output ?></h2> -->
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>