<?php
	include("conn.php");
	session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<title>search</title>	 
</head>
<body>
 <div class="container">
<nav class="navbar navbar-default">

    <h1>KOLEJ WAWASAN STUDENTS MANAGEMENT SYSTEM</h1>
    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
      <li><a href="new.php">New Student</a></li>
      <li class="active"><a href="search.php">Search</a></li>
      <li><a href="update.php">Update</a></li>
      <li><a href="delete.php">Delete</a></li>
    </ul>

  </nav>
    <h3>Searching For Student</h3>

<form action="search.php" method="post"> 
	<input type="text" name="search" placeholder="Search For Student..">
	<input type="submit" value=">>"> <br>
	<br>

</form>
<?php  
	//ambik data
	$output = "";
	if (isset($_POST['search'])) {
	$searchq = $_POST['search']; //searchq = query
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	?>
<table border="2">
	<tr>
		<th>StudentName</th>
		<th>NoIc</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>PostCode</th>
		<th>TelNo</th>
		<th>Course</th>
		<th>Email</th>
	</tr>
	<?php 

	$query = "SELECT * FROM products WHERE product_name LIKE '%$searchq%'";
	$result = mysql_query($query);

	$query_total = "SELECT * FROM products WHERE product_name LIKE '%$searchq%'";
	$total_result = mysql_query($query_total);

	$total_record = mysql_num_rows($total_result);//jumlah rekod
	
	while ($row = mysql_fetch_array($result)) {

	 ?>
	<tr>
		<td><?php echo $row['product_name']; ?></td>
		<td><?php echo $row['product_desc']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><?php echo $row['state']; ?></td>
		<td><?php echo $row['post_code']; ?></td>
		<td><?php echo $row['tel_no']; ?></td>
		<td><?php echo $row['course']; ?></td>
		<td><?php echo $row['email']; ?></td>
	</tr>
	<?php
		}

		if ($total_record == 0) {
			$output = 'There Is No Data!!';
		}
	}
	?>
</table>

<h2><?php echo $output ?></h2>
</div>
</body>
</html>