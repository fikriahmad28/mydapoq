 <?php
	session_start(); 
	include('config.php');

	if(!isset($_SESSION['username']))
		header('location: login.php?e=true');
	$query = 'SELECT * FROM products INNER JOIN category ON products.category = category.id_category ORDER BY id';
	$result = mysqli_query($conn, $query);

	// if(isset($_GET["page"])) {
	// 	$page = $_GET["page"]; }
	// else {
	// 	$page=1;	
	// }
	// $start_from = ($page-1) * 5;
	// $sql = "SELECT * from products ORDER BY id ASC LIMIT $start_from, 5";
	// $rs_result = mysqli_query ($sql, $conn)
?>	
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/icon.png" />
	<title>Sales - MyDapoq</title>
</head>
<body>
<header>
<div class="nav-top">
	<?php include('nav-top.php'); ?>
</div>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">
<div class="cart-view-table-back">
	<h3 align="center">Product List</h3>
<table width="100%" cellpadding="6">
	<thead>
		<th>Id</th><th>Product Code</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Stock Available</th><th>Edit</th><th>Delete</th>
	</thead>
	<tbody>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
		$i++;

		//while ($row = mysqli_fetch_assoc($rs_result)) {

		?>
	    <tr>
	       <td><?= $row['id']; ?></td>
	       <td><?= $row['product_code']; ?></td> 
	       <td><?= $row['product_name']; ?></td> 
	       <td class="product_list_desc"><?= $row['product_description']; ?></td>
	       <td><?= $currency.$row['product_price']; ?></td> 
	       <td><?= $row['category_name']; ?></td> 
	       <td><?= $row['quantity']; ?></td> 
	       <td><a href="update-product.php?id=<?php echo $row['id'];?>"><img src="images/icon-edit.png" style="width: 35px"></td>
	       <td><a href="product_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Padam id <?php echo $row['id']; ?>?')" ><img src="images/icon-del.png" style="width: 35px;"></a></td>
	    </tr>
		<?php
		    }
		?>
	</tbody>
</table>
</div>
<div class="print">
	<button onclick="window.print();">Print</button>
</div>
</div>
<footer>
	<?php include('footer.php'); ?>
</footer>
</body>
</html>