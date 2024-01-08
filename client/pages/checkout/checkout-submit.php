<?php
// script for handling checkout form info
session_start();

$step = $_SESSION['checkout_info']['current_step'];

include_once '../../../php-modules/validate-checkout.php';

// validate, sanitize, and save input to session
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateCheckout($step);
}

// go to next checkout step after validating input
if($step === 1) {
  $_SESSION['checkout_info']['current_step'] = 2;
  header("location: /checkout");
  exit;
} elseif($step === 2) {
  $_SESSION['checkout_info']['current_step'] = 3;
  header("location: /checkout");
  exit;
} elseif($step === 3) {
  $_SESSION['checkout_info']['current_step'] = 4;
  header("location: /order-confirmation");
  exit;
} else {
  $_SESSION['checkout_info']['current_step'] = 1;
  header("location: /checkout");
  exit;
}






?>