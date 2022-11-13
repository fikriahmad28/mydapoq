<ul>
	<?php
		if(isset($_SESSION['username']) == TRUE ) {
	?>
	<li><a class="active" href="product_add.php">New Product</a></li>
	<li><a href="product_list.php">Product List</a></li>
	<li><a href="sales.php">Sales</a></li>	
	<?php
		} else { ?>
	<li><a href="index.php"><img src="images\icon-home.png"></a></li>
	<li><div class="dropdown"><a href="categories.php">CATEGORIES</a>
  	<div class="dropdown-content">
  		<?php while ($row = mysqli_fetch_assoc($result_category)) { ?>
   			<a href="categories.php?cat=<?php echo $row['id_category'];?>">
   			<option value="<?= $row['id_category']; ?>"><?= $row['category_name']; ?></option></a>
   		<?php } ?>
 	</div>
	</div></li>
	<li><a href="view_cart.php">SHOPPING CART</a></li>
	<li style="float: right">
		<div class="search">
			<form method="POST" action="index.php">
			<input type="search" name="search_input" placeholder=" Search for products name">
			<input class="search-button" type="submit" name="search" value=">>">
			</form>
		</div>
	</li>
	<li><a href="how-to-buy.php">How To Buy</a></li>
	<li><a href="contact-us.php">Contact Us</a></li>
	<?php		
		}
	?>
</ul>