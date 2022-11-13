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
	<title>MyDapoq - Your Kitchen's Expert</title>
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
<!-- SENARAI PRODUK -->
	<ul class="products">
	<?php
	if (isset($_GET['cat']) && !empty( $_GET['cat'])) {
		if (isset($_GET['cat'])) {
			$id = $_GET['cat'];
			$query = "SELECT * FROM products INNER JOIN category ON products.category = category.id_category WHERE category = '$id' ORDER BY id DESC";
		 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		} 	
		if(mysqli_num_rows($result) > 0){
	    while($row = mysqli_fetch_assoc($result)){
	?>
		<li>
			<form method="POST" action="update_cart.php">
				<div>
					<button type="submit" class="add_to_cart" >Buy Now</button>
				</div>
				<a href="product.php?id=<?php echo $row['id'];?>">
				<div class="product_photo">
					<img src="images/<?= $row['product_photo'] ?>" width="90%" />
					<!-- <span class="text-content"><span><?php echo $row['product_name'];?></span></span> -->
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
		} else
	 		echo 'Tiada senarai produk';
	} else {
			$query = "SELECT * FROM category";
		 	$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result) > 0){
	    	while($row = mysqli_fetch_assoc($result)){
	?>
		<li class="category">
			<form method="POST" action="update_cart.php">

				<a href="categories.php?cat=<?php echo $row['id_category'];?>">
				<div class="product_photo">
					<img src="images/<?= $row['category_photo'] ?>"/>
				</div>
				<div class="">
					<h4><?= $row['category_name'] ?></h4>
				</div>
				</a>
				<div class="product_info">
						<input type="hidden" name="type" value="add" />
						<input type="hidden" name="product_id" value="<?= $row['id']; ?>" />
				</div>
			</form>
       	</li>
<?php
		}
		} else
	 		echo '<h3 align="center>No products available.</h3>';
	}
?>
</ul>
</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>