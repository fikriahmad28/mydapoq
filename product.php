<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['cart_products'])) {
		$total_cart = count($_SESSION['cart_products']); }
	else {
		$total_cart = 0;
	}
	if (isset($_POST['product_name'])) {
		$product_name = $_POST['product_name'];
		$product_photo = $_POST['product_photo'];
	}
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM products WHERE id=$id";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
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
	<title><?= $row['product_name']; ?> - MyDapoq</title>
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
	<ul class="products">
	<?php
		$id = $_GET['id'];

		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$query = "SELECT * FROM products WHERE id=$id";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
		}
	?>
		<li class="product">
			<form method="POST" action="update_cart.php">
				<div class="product_name">
					<h3><?= $row['product_name']; ?></h3>
					</div>
				<div class="product_photo">
					<img src="images/<?= $row['product_photo'] ?>"/>
					</div>
				<div class="product_desc">
					<?= $row['product_description']; ?>
					</div>
				<div class="product_info">
					<fieldset>
					<label>
						<span>Price</span><span class="price"><?= $currency.number_format($row['product_price'], 2) ?></span>
					</label>
					</fieldset>
					<fieldset>
					<label>
						<span>Stock </span><span class="price"><?= $row['quantity']; ?></span>
					</label> 
					</fieldset>
					<fieldset>
					<label>
						<span>Quantity</span>
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
						<div align="center">
							<button type="submit" class="add_to_cart" >Buy Now</button>
						</div>
					</div>
			</form>
		</li>
	</ul>
	<ul class="other-products">
	<h3>Other Products</h3>
	<?php 
		if(isset($_POST['search']) && !empty($_POST['search_input'])) {
			// input from search box

			$search_input = $_POST['search_input'];

			// query search data in db

			$query = "SELECT * FROM products INNER JOIN category ON products.category = category.id_category WHERE product_name LIKE '%$search_input%' || category_name LIKE '%$search_input%'";
			$result = mysqli_query ($conn, $query);
		} else {
		$query = 'SELECT * FROM products ORDER BY RAND() LIMIT 0,4';
		$result = mysqli_query($conn, $query); 
		}
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
	?>
		<li>
			<form method="POST" action="update_cart.php">
<!-- 				<div>
					<button type="submit" class="add_to_cart" >Buy Now</button>
				</div> -->
				<a href="product.php?id=<?php echo $row['id'];?>">
				<div class="product_photo">
					<img src="images/<?= $row['product_photo'] ?>" width="90%" />
					<span class="text-content">Details</span>
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
					<!-- <label>
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
						<input type="text" size="2" maxLength="2" name="product_quantity" value="1" />
					</label> -->
					</fieldset>
						<input type="hidden" name="type" value="add" />
						<input type="hidden" name="product_id" value="<?= $row['id']; ?>" />

				</div>
			</form>
		</li>
	<?php		
		}	
	}
	else
		echo '<h4 align="center">Opss. No products available. Try other keywords?</h4>';
	?>
	</ul>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>