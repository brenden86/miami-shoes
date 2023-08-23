<?php
// script for handling checkout form info
session_start();


// store form data in session
foreach($_POST as $key => $value) {
  $_SESSION['checkout_info'][$key] = $value;
}

// same billing and shipping address
if($_SESSION['checkout_info']['same_address'] === 'true') {
  $_SESSION['checkout_info']['shipping_first_name'] = $_SESSION['checkout_info']['billing_first_name'];
  $_SESSION['checkout_info']['shipping_last_name'] = $_SESSION['checkout_info']['billing_last_name'];
  $_SESSION['checkout_info']['shipping_street1'] = $_SESSION['checkout_info']['billing_street1'];
  $_SESSION['checkout_info']['shipping_street2'] = $_SESSION['checkout_info']['billing_street2'];
  $_SESSION['checkout_info']['shipping_city'] = $_SESSION['checkout_info']['billing_city'];
  $_SESSION['checkout_info']['shipping_state'] = $_SESSION['checkout_info']['billing_state'];
  $_SESSION['checkout_info']['shipping_zip'] = $_SESSION['checkout_info']['billing_zip'];
  $_SESSION['checkout_info']['shipping_company'] = $_SESSION['checkout_info']['billing_company'];

}

// go to next checkout step
$step = $_SESSION['checkout_info']['current_step'];
if($step === 1) {
  $_SESSION['checkout_info']['current_step'] = 2;
  header("location: /client/checkout.php");
  exit;
} elseif($step === 2) {
  $_SESSION['checkout_info']['current_step'] = 3;
  header("location: /client/checkout.php");
  exit;
} elseif($step === 3) {
  $_SESSION['checkout_info']['current_step'] = 4;
  header("location: /client/order-confirmation.php");
  exit;
} else {
  $_SESSION['checkout_info']['current_step'] = 1;
  header("location: /client/checkout.php");
  exit;
}






?>