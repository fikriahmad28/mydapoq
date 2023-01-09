<?php
	session_start();
	include ('config.php');

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
	<title>Dashboard - MyDapoq</title>
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
// admin dashboard
$sql1 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT count(id) as total from products;")));
$sql2 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT count(id) as total from products WHERE category=1;")));
$sql3 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT count(id) as total from products WHERE category=2;")));
$sql4 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT count(id) as total from products WHERE category=3;")));
$sql5 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT count(id) as total from products WHERE category=4;")));
$sql6 = mysqli_fetch_assoc((mysqli_query($conn, "SELECT sum(product_price) as total from sales;")));
?>

<div class="cart-view-table-back">
	<h3 align="center"><img src="images/icon-add.png" style="width: 20px"> Dashboard</h3>
	<form method="POST" enctype="multipart/form-data">
	<div class="form">
        <div class="card">
            <p>Total Product [ <?= $sql1['total']?> ] products</p>
            <p>Total Product - Blender & Mixer [ <?= $sql2['total']?> ] products</p>
            <p>Total Product - Cookware [ <?= $sql3['total']?> ] products</p>
            <p>Total Product - Microwave & Oven[ <?= $sql4['total']?> ] products</p>
            <p>Total Product - Cooktops[ <?= $sql5['total']?> ] products</p>
        </div>
        <div class="card">
            <p>Total Sales RM <?= $sql6['total']?></p>
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