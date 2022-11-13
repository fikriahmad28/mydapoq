<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['cart_products'])) {
		$total_cart = count($_SESSION['cart_products']); }
	else {
		$total_cart = 0;
	}
	unset($_SESSION['username']);
	// nav-menu category
	$query_category = 'SELECT * FROM category';
	$result_category = mysqli_query($conn, $query_category) or die (mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/icon.png" />
	<script type="text/javascript" src="css/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="css/jquery.cycle2.min.js"></script>
	<title>MyDapoq - Your Kitchen's Expert</title>
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
	<?php include('cart_item.php'); ?>
<div class="container">
<div class="slider">
	<div class="cycle-slideshow" data-cycle-fx="scrollHorz">
		<img src="images/banner01.jpg">
		<img src="images/banner02.jpg">
		<img src="images/banner03.jpg">
		<img src="images/banner04.jpg">
		<img src="images/banner05.jpg">
	</div>
</div>
	<!-- SENARAI PRODUK -->
	<ul class="products">
	<h3>Featured Products</h3>

	<?php 
	$results_per_page = 6; // number of results per page
	if(isset($_GET["page"])) {$page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * $results_per_page;

		if(isset($_POST['search']) && !empty($_POST['search_input'])) {
			// input from search box

			$search_input = $_POST['search_input'];

			// query search data in db

			$query = "SELECT * FROM products INNER JOIN category ON products.category = category.id_category WHERE product_name LIKE '%$search_input%' || category_name LIKE '%$search_input%' LIMIT $start_from, ".$results_per_page;
			$result = mysqli_query ($conn, $query);
		} else {
	$results_per_page = 6; // number of results per page
	if(isset($_GET["page"])) {$page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * $results_per_page;
	$sql = "SELECT * FROM products ORDER BY id LIMIT $start_from, ".$results_per_page;
	$result = $conn->query($sql);
		}
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
	?>
		<li>
			<form method="POST" action="update_cart.php">
				<div>
					<button type="submit" class="add_to_cart" >Buy Now</button>
				</div>
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
		}	?>
			<div class="list-page">
		<?php 
		$sql = "SELECT COUNT(ID) AS total FROM products ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
		  
		for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
			echo "<a href='index.php?page=".$i."'";
		        if ($i==$page)  echo " class='curPage'";
		            echo ">[ " .$i." ]</a> "; 
		}; 
	?>
	</div>
	<?php
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