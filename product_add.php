<?php
	session_start();
	include ('config.php');

	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$query = "SELECT * FROM user where username='$username' AND pass='$pass';";

		$result = mysqli_query($conn, $query) ;
		if(mysqli_num_rows($result) == 0 ) // login fail
			header('location: login.php?e=true'); // goto login

		$_SESSION['username'] = $username; // success set session username
		}

	if(!isset($_SESSION['username'])) // direct access
	header('location: login.php?e=true'); // goto login


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
	<title>Add New Product - MyDapoq</title>
</head>
<body>
<header>
	<?php include('nav-top.php'); ?>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">
<?php
	if(isset($_POST['product_code'])) {

		$target_dir = "images/"; // set untuk upload gambar ke folder
		$target_file = $target_dir . basename($_FILES["product_photo"]["name"]);

	// echo $target_file; // dapatkan nama file dan target folder
		if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $target_file)) { // upload file
			$product_code = $_POST['product_code'];
			$product_name = $_POST['product_name'];
			$product_description = $_POST['product_description'];
			$product_price = $_POST['product_price'];
			$product_photo = $_FILES["product_photo"]["name"];
			$category = $_POST['category'];
			$quantity = $_POST['quantity'];
			$query = "INSERT INTO products (product_code, product_name, product_description, product_price, product_photo, category, quantity) VALUES ('$product_code', '$product_name', '$product_description', '$product_price', '$product_photo', '$category', '$quantity')";
			$result = mysqli_query($conn, $query);
		if($result)
			echo "&nbsp;&nbsp;&nbsp;&nbsp;New product added";
		}	else
		echo '&nbsp;&nbsp;&nbsp;&nbsp;Failed to add new product';
	}	
?>
<div class="cart-view-table-back">
	<h3 align="center"><img src="images/icon-add.png" style="width: 20px"> Add New Product</h3>
	<form method="POST" enctype="multipart/form-data">
	<div class="form">
		<div class="input">
			<label>Product Code</label>
			<input name="product_code">
		</div>
		<div class="input">
			<label>Name</label>
			<input name="product_name">
		</div>
		<div class="input">
			<label>Description</label>
			<input name="product_description">
		</div>
		<div class="input">
			<label>Price (RM)</label>
			<input name="product_price">
		</div>
		<div class="input">
			<label>Product Photo</label>
			<input name="product_photo" type="file">
		</div>
		<div class="input">
			<label>Category</label>
			<select name="category">
				<?php while ($rows = mysqli_fetch_assoc($result_category)) { ?>
				<option value="<?= $rows['id_category']; ?>"><?= $rows['category_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="input">
			<label>Quantity</label>
			<input name="quantity">
		</div>
		<div class="input">
			<button type="reset">Reset</button>
			<button type="submit">Key-in</button>
		</div>
	</div>
	</form>
	</div>
	</div>
</div>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>