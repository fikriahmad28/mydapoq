<?php
    if(!isset($_SESSION)) 
    { 
    	session_start(); 
    } 
	unset($_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Admin Login - MyDapoq</title>
</head>
<body>
	<div class="login">
		<form class="login" method="POST" action="product_add.php">
			<div class="input">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input">
				<label>Password</label>
				<input type="password" name="pass">
			</div>
			<div class="input">
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
</body>
</html>