<div class="nav-top">
<div class="nav-top-sec">
	<a href="index.php"><img class="logo" src="images/logo.png"></a>
	<?php if(isset($_SESSION['username']) == TRUE ) { ?>
		<li><a class="admin-button" href="login.php">LOGOUT</a></li>
		<li><a class="admin-button"><img src="images\icon-user.png">Hi, <?php echo $_SESSION['username']; ?></a></li>
	<?php 
		} else {
		?>
		<li><a class="admin-button" href="about-us.php"><img src="images\icon-about.png">ABOUT US</a></li>
		<li><a class="admin-button" href="#popup2"><img src="images\icon-cart-white.png"><?php echo "($total_cart)"; ?></a></li>
		<li><a class="admin-button" href="#popup1"><img src="images\icon-user.png">LOGIN</a></li>
		<?php
		}
	?>
</div>
</div>