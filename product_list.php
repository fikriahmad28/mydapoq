<?php
	session_start(); 
	include('config.php');

	if(!isset($_SESSION['username']))
		header('location: login.php?e=true');

	$results_per_page = 5; // number of results per page
	if(isset($_GET["page"])) {$page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * $results_per_page;
	$sql = "SELECT * FROM products INNER JOIN category ON products.category = category.id_category ORDER BY id LIMIT $start_from, ".$results_per_page;
	$result = $conn->query($sql);
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
			while($row = $result->fetch_assoc()) {
		$i++;

		//while ($row = mysqli_fetch_assoc($result)) {

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
<div class="product-list-page">
	<?php 
		$sql = "SELECT COUNT(ID) AS total FROM products ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
		  
		for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
			echo "<a href='product_list.php?page=".$i."'";
		        if ($i==$page)  echo " class='curPage'";
		            echo ">[ " .$i." ]</a> "; 
		}; 
	?>
</div>
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