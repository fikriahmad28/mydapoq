 <?php
	session_start();
	include ('config.php');
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
	<link rel="shortcut icon" href="images/icon.png" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Shopping Cart - MyDapoq</title>
</head>
<body>
<header>
	<?php include('nav-top.php'); ?>
</div>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Login</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<?php include('login_popup.php') ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="cart-view-table-back">
		<form method="POST" action="update_cart.php">
			<table width="100%" cellpadding="2" cellspacing="2">
				<thead>
					<tr><th>Quantity</th><th>Item</th><th>Price (<?= $currency; ?>)</th><th>Total (<?= $currency; ?>)</th><th><img src="images/delete.png"></th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($_SESSION['cart_products'])) {
							$total = 0;
							foreach ($_SESSION['cart_products'] as $key => $value) {
					?>
							<tr>
								<td align="center">
								<input name="product_quantity[<?= $value['id'] ?>]" size="2" maxLength="2" value="<?= $value['product_quantity'] ?>" />
								</td>
								<td><?= $value['product_name'] ?></td>
								<td align="center"><?= number_format($value['product_price'], 2) ?></td>
								<td align="center"><?= number_format($value['product_price'] * $value['product_quantity'], 2) ?></td>
								<td align="center"><input type="checkbox" name="remove_code[]" value="<?= $value['id'] ?>"></td>
							</tr>
					<?php 		
								$subtotal = ($value['product_price'] * $value['product_quantity']);
								$total += $subtotal;
							} // close foreach
							$_SESSION['total'] = $total;
					?>
							<tr>
								<td colspan="5">
									<span style="float:right; text-align: right; font-weight: bold;">
										Total Amount: <?php echo $currency.number_format($total, 2); ?></span>
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<input type="hidden" name="checkout" value="1">
									<a href="index.php" class="button">Continue Shopping</a>
									<button type="submit">Update</button>
									<a href="buyer.php" class="button" style="float: right;">Proceed</a>
								</td>
							</tr>
														<tr>
					<?php } else { ?>
								<td colspan="5">
									<span style="text-align: center; font-weight: bold;">
										<h4>No item in your shopping cart.</h4></span>
								</td>
					<?php } ?>
							</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
<footer>
	<?php include('footer.php'); ?>
</footer>
</body>
</html>