<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $subtotal = round($_POST['total'], 2);
	$total = $subtotal * 100;

  $post_data = array(
    'userSecretKey'=>'zz3w8e57-0ahr-z8f3-xiad-iyc3qinr03dy',
    'categoryCode'=>'134ry67b',
    'billName'=>'MyDapoq',
    'billDescription'=>'MyDapoq Payment Today',
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$total,
    'billReturnUrl'=>'http://localhost/cart/response.php',
    'billCallbackUrl'=>'http://localhost/cart/callbackresponse.php',
    'billExternalReferenceNo' => 'AFR341DFI',
    'billTo'=>$name,
    'billEmail'=>$email,
    'billPhone'=>'0123456789',
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billChargeToCustomer'=>1,
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

  $result = curl_exec($curl);
  $info = curl_getinfo($curl);
  curl_close($curl);
  $result = json_decode($result, true);

  $post_data['billCode'] = $result[0]['BillCode'];
  $post_data['paymentURL'] = 'https://dev.toyyibpay.com/' . $result[0]['BillCode'];

  // insert into booking table
  $bill_code = $result[0]['BillCode'];

  header('Location: ' . $post_data['paymentURL']);