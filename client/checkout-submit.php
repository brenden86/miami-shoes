<?php
// script for handling checkout form info
session_start();

// initialize checkout info arrays if not already present
if(!isset($_SESSION['checkout-info']['billing'])) {
  $_SESSION['checkout-info']['billing'] = array();
} elseif(!isset($_SESSION['checkout-info'])) {
  $_SESSION['checkout-info'] = array();
}

// $_SESSION['checkout-info'] = array();
// $_SESSION['checkout-info']['billing'] = array();

// 
$billing_info = array();
foreach($_POST as $key => $value) {
  $_SESSION['checkout-info']['billing'][$key] = $value;
}

echo 'SESSION: <br>';
print_r($_SESSION['checkout-info']['billing']);

header("location: /client/checkout.php");
exit;






?>