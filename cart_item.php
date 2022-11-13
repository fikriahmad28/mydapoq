<!-- SENARAI PRODUK DALAM CART -->
	<div id="popup2" class="overlay2">
		<div class="popup2">
			<div class="mycart">
				<h4><img src="images\icon-cart-white.png">Cart Info</h4>
			</div><hr>
			<a class="close" href="#">&times;</a>
		<div class="content2">
		<?php 
			if(isset($_SESSION['cart_products']) && count($_SESSION['cart_products'])) {
		?>
	<div class="cart-item-table">
	<form method="POST" action="update_cart.php">
		<table width="100%" cellspacing="1" cellpadding="6">
			<thead>
				<th>Quantity</th><th>Product Name</th><th><img src="images/delete.png"></th>
			</thead>
			<tbody>
			<?php
				foreach ($_SESSION['cart_products'] as $key => $value) {
				?>
				<tr align="center">
					<td><input name="product_quantity[<?= $value['id'] ?>]" type="text" size="2" maxLength="2" value="<?= $value['product_quantity'] ?>"></td>
					<td><?= $value['product_name'] ?></td>
					<td><input type="checkbox" name="remove_code[]" value="<?= $value['id'] ?>" /></td>
					</tr>

				<?php } //close foreach ?>

				<tr>
					<td colspan="4">
						<a href="view_cart.php" class="button"><img src="images\icon-checkout.png" class="checkout">Checkout</a>
						<button type="submit">Update</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form> 
	</div>
<?php 
	}
	else
		echo '<h4 align="center">No item </h4>';
?>
	</div>
	</div>
	</div>