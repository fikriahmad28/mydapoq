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

if(isset($_POST['product_code'])) { //kalau submit form
		$product_code = $_POST['product_code']; // data from input form
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$product_price = $_POST['product_price'];
		$product_photo = $_POST['product_photo'];
		$category = $_POST['category'];
		$quantity = $_POST['quantity'];
		$id = $_GET['id'];

		$sql = "UPDATE products SET product_code='$product_code', product_name='$product_name', product_description='$product_description', product_price='$product_price', product_photo='$product_photo', category='$category',"
			."quantity='$quantity' WHERE id='$id'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		if($query) { // if successfully inserted
			header("location: product_list.php");
		}
}
	if(isset($_GET['id'])) { //kalau click
		$id = $_GET['id'];
		$sql = "SELECT * FROM products WHERE id=$id";
		$result = mysqli_query($conn, $sql);
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
	<title>Edit Product - MyDapoq</title>
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
	<h3 align="center">Edit Product</h3>
	<form method="post" enctype="multipart/form-data"  onsubmit="return validation();">
	<div class="form">
		<div class="input">
			<label>Product Code</label>
			<input name="product_code" id="product_code" value="<?= $row['product_code']?>">
		</div>
		<div class="input">
			<label>Name</label>
			<input name="product_name" id="product_name" value="<?= $row['product_name']?>">
		</div>
		<div class="input">
			<label>Description</label>
			<input name="product_description" id="product_description"" rows="5" cols="50" value="<?= $row['product_description']?>">
		</div>
		<div class="input">
			<label>Price (RM)</label>
			<input name="product_price" id="product_price" value="<?= $row['product_price']?>">
		</div>
		<div class="input">
			<label>Product Photo</label>
			<input name="product_photo" id="product_photo" value="<?php echo $row['product_photo']?>">
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
			<input name="quantity" id="quantity" value="<?= $row['quantity']?>">
		</div>
		<div class="input">
			<button type="reset">Reset</button>
			<button type="submit">Update</button>
		</div>
	</div>
	</form>
</div>
</div>
<script>
		function validation() {
			if(!confirm("Update this product?")) {
				return false; //not submit
			}
			var mesti = document.getElementsByClassName("mesti");
			var jumlah_mesti = mesti.length;
			for(var i = 0; i < jumlah_mesti; i++) {
					mesti[i].style.background = ""; //clear all red
				}

				for(var i = 0; i < jumlah_mesti; i++) {
					if(mesti[i].value==""){//kalau empty
						mesti[i].style.background = "red";
					return false; //Jangan submit
				}
				
			}
			return true;
		}
	</script>
<footer>
	<?php include('footer.php') ?>
</footer>
</body>
</html>