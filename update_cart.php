<?php
 	session_start();
	include_once('config.php'); 

	if(isset($_POST['type']) && $_POST['type']  == 'add' && $_POST['product_quantity'] > 0) {
		$query = "SELECT * FROM products WHERE id = $_POST[product_id]";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

//		if(isset($_SESSION['cart_products'])) {
//			if(isset($_SESSION['cart_products'][$row['id']])) {
//				unset($_SESSION['cart_products'][$row['id']]);
//			}
//		}
		$row['product_quantity'] = $_POST['product_quantity']; //add quantity to array $row
		$_SESSION['cart_products'][$row['id']]= $row;
	}

	if(isset($_POST['product_quantity']) || isset($_POST['remove_code'])) {

		if(isset($_POST['product_quantity']) && is_array($_POST['product_quantity'])) {
			foreach ($_POST['product_quantity'] as $key => $value) {
				if(is_numeric($value)) {
					$_SESSION['cart_products'][$key]['product_quantity'] = $value;
				}
			}
		}

		// delete item dalam cart
		if(isset($_POST['remove_code']) && is_array($_POST['remove_code'])) {
			foreach ($_POST['remove_code'] as $key => $value) {
				unset($_SESSION['cart_products'][$value]);
				}
			}
		}
	if(isset($_POST['checkout']))
		header("location: view_cart.php");
	else
		header("location: ./"); // back to index file
	?>