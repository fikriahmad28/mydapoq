<ul>
	<li><a href="index.php"><img src="images\icon-home.png"></a></li>
	<li><div class="dropdown"><a href="categories.php">CATEGORIES</a>
  	<div class="dropdown-content">
  		<?php while ($row = mysqli_fetch_assoc($result_category)) { ?>
   			<a href="categories.php?cat=<?php echo $row['id_category'];?>">
   			<option value="<?= $row['id_category']; ?>"><?= $row['category_name']; ?></option></a>
   		<?php } ?>
 	</div>
	</div></li>
	<li><a href="payment.php">How To Pay</a></li>
	<li style="float: right">
		<div class="search">
			<form method="POST" action="index.php">
			<input type="search" name="search_input" placeholder="Search...">
			<input class="search-button" type="submit" name="search" value=">>">
			</form>
		</div>
	</li>
	<?php
		if(isset($_POST['username'])) {

	?>
	<li><a class="active" href="new_product.php">New Product</a></li>
	<li><a href="product_list.php">Product List</a></li>
	<li><a href="sales.php">Sales</a></li>	
	<?php
		} else {
			
		}
	?>
</ul>