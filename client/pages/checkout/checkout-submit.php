<?php
// script for handling checkout form info
session_start();


$step = $_SESSION['checkout_info']['current_step'];

include_once '../../../php-scripts/validate-checkout.php';

// validate, sanitize, and save input to session
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateCheckout($step);
}

// go to next checkout step
if($step === 1) {
  $_SESSION['checkout_info']['current_step'] = 2;
  header("location: /pages/checkout/checkout.php");
  exit;
} elseif($step === 2) {
  $_SESSION['checkout_info']['current_step'] = 3;
  header("location: /pages/checkout/checkout.php");
  exit;
} elseif($step === 3) {
  $_SESSION['checkout_info']['current_step'] = 4;
  header("location: /pages/order-confirmation/order-confirmation.php");
  exit;
} else {
  $_SESSION['checkout_info']['current_step'] = 1;
  header("location: /pages/checkout/checkout.php");
  exit;
}






?>