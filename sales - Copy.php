<?php
	session_start(); 
	include('config.php');

	if(!isset($_SESSION['username']))
		header('location: login.php?e=true');
	$query = "SELECT * FROM sales LEFT JOIN customers"
        ." ON sales.id_customers = customers.id";
	$result = mysqli_query($conn, $query);
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
	<?php include('nav-top.php'); ?>
</header>
<nav>
	<?php include('nav-menu.php'); ?>
</nav>
<div class="container">
<div class="cart-view-table-back">
	<h3 align="center">Total Sales</h3>
<table width="100%" cellpadding="6">
	<thead>
		<th>No</th><th>Product Code</th><th>Price (RM)</th><th>Quantity</th><th>Buyer's Name</th><th>E-mail</th><th>Address</th><!-- <th>Status</th> -->
	</thead>
	<tbody>
		<?php

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$i++;
		?>
	    <tr>
	       <td><?= $i ?></td>
	       <td><?= $row['product_code']; ?></td> 
	       <td><?= $row['product_price']; ?></td> 
	       <td><?= $row['quantity']; ?></td> 
	       <td><?= $row['name']; ?></td> 
	       <td><?= $row['email']; ?></td> 
	       <td><?= $row['address']; ?></td> 
	       <!-- <td><?= $row['status']; ?></td> -->
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