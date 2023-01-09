<?php
session_start();
include('config.php');

// echo '<pre>';
// echo 'GET Data';
// print_r($_GET);
// echo 'POST Data';
// print_r($_POST);
// echo '</pre>';
// exit;

echo '<pre>';
echo 'GET Data';
print_r($_GET);
echo 'POST Data';
print_r($_POST);
echo '</pre>';

$bill_code = $_GET['billcode'];

if ($_GET['status_id'] == 1) {

    $to = 'fikri.ahmad@gmail.com';
    $subject = 'Hello from XAMPP!';
    $message = 'This is a test';
    $headers = "From: admin@mydapoq.com\r\n";
    if (mail($to, $subject, $message, $headers)) {
       echo "SUCCESS";
    } else {
       echo "ERROR";
    }

    // header('location: index.php?e=payment-success');
} else {

    // header('location: index.php?e=payment-failed');
}
exit;