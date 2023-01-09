<?php
	session_start(); 
	include('config.php');

	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
	    $address = $_POST['address'];

		$query = "INSERT INTO customers (name, email, address) VALUES ('$name','$email','$address');";
		$result = mysqli_query($conn, $query);
		if($result)
			header('location: success.php');
		$select = "SELECT id FROM customers WHERE email='$email'";
		$idResult = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($idResult);
		$idCustomer = $row['id'];
		foreach ($_SESSION['cart_products'] as $key => $value) {
			$product_code = $value['product_code'];
			$product_price = $value['product_price'];
			$quantity = $value['product_quantity'];
			$insert = "INSERT INTO sales (id_customers, product_code, product_price, quantity)"
						."VALUES ($idCustomer, '$product_code', $product_price, $quantity);";
	        $sales = mysqli_query($conn, $insert);
		}
	}
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
	<title>Buyer Detail - MyDapoq</title>
</head>
<body>
<header>
	<?php include('nav-top.php'); ?>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">
		<div class="cart-view-table-back">
			<h1 align="center">Buyer Information</h1>
			<form method="POST" enctype="multipart/form-data" action="payment-gateway.php">
				<div class="form">
					<div class="input">
						<label>Name</label>
						<input name="name">
					</div>
					<div class="input">
						<label>E-mail Address</label>
						<input name="email">
					</div>
					<div class="input">
						<label>Address</label>
						<input name="address">
					</div>
					<?php
					if (isset($_SESSION['cart_products'])) {
						$total = 0;
						foreach ($_SESSION['cart_products'] as $key => $value) {
					?>
							<div class="input">
								<label>Product Name</label>
								<input name="product_name" value="<?= $value['product_name'] ?>">
							</div>
							<div class="input">
								<label>Product Quantity</label>
								<input name="product_quantity" value="<?= $value['product_quantity'] ?>">
							</div>
						<?php
							$subtotal = ($value['product_price'] * $value['product_quantity']);
							$total += $subtotal;
						} // close foreach
						$_SESSION['total'] = $total;
						?>
						<div class="input">
							<label>Total (RM)</label>
							<input name="total" value="<?= number_format($total, 2); ?>">
						</div>
					<?php } ?>
					<div class="input">
						<button type="submit" name="submit">Submit</a></button>
						<button type="reset">Reset</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<footer>
	<?php include('footer.php'); ?>
</footer>
</body>
</html>