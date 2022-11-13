<?php 
session_start();
include('conn.php');


if (!isset($_SESSION['username']) || $_SESSION['username'] =="") {
	$_SESSION['username'] = FALSE;}

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "SELECT * from user WHERE username='$username' AND password='$password';";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) == 0 )
		  header('location: login.php?e=true');

		$_SESSION['username'] = $username;
}

?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link href="css/style.css" rel="stylesheet" type"text/css">
<title>Shopping Cart</title>
</head>
<body>

<header>
	<h1>ABI APPAREL</h1>
	<h3>THE PALACE OF BAJU MELAYU</h3>
</header>
	<h1 align="center"></h1>
<div class="menu-bar">
	<ul class ="menu">
		<li><a href="index-admin.php" class="active">Utama</a></li>
		<?php if ($_SESSION['username'] == TRUE) { ?>
		<li><a href="product.php">Masukkan Produk</a></li>
		<li><a href="sales.php">Senarai Jualan</a></li>
		<?php } else { }?>
		<li  style="float:right;"><a href="login.php" class="logout">Log Keluar</a></li>
	</ul>	
</div>
	
<br><br><br><br>

<!-- SENARAI PRODUK !-->
<ul class="products">	
<?php
	$query = 'SELECT * FROM products';
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
?>
	<li class="product">
		<form method="post" action="update_cart.php">
		<div class="product_name">
			<h3><?= $row['product_name'];?></h3>
		</div>
		<div class="product_image">
			<img src="images/<?= $row['product_photo'];?>" width="70%" height="250px">
		</div>
		<div class="product_desc">
			<?= $row['product_description'] ?>
		</div>
		<div class="product_info">
			Harga : <?= $currency.number_format($row['product_price'], 2); ?>
			<br><br>
			Kuantiti dalam stok : <?= ($row['quantity']) ?>
			<br><br>
		<div class="tool">
		<center>
			<a href="update-product.php?id=<?php echo $row['id'];?>"><img src="images/update.png" width="25" height="25"></a>
			<a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Padam <?php echo $row['product_name']; ?>?')">
       		<img src="images/delete.png" width="20" height="20"></a>
       	</center>
       	</div>
		</div>
		</form>
	</li>
<?php
		}
	}
	else
		echo 'Tiada senarai produk'
?>
	</ul>
	
<?php
	include('footer.php')
?>

</body>
</html>