<?php
			$query = "SELECT * FROM category";
		 	$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result) > 0){
	    	while($row = mysqli_fetch_assoc($result)){
	?>
		<li class="category-nav">
			<form method="POST" action="update_cart.php">

				<a href="categories.php?cat=<?php echo $row['id_category'];?>">
				<div class="product_photo">
					<img src="images/<?= $row['category_photo'] ?>"/>
				</div>
				<div class="product_name">
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
	 		echo 'Tiada senarai produk';
?>