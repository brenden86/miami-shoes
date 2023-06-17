<?php

$request_path = $_SERVER['REQUEST_URI'];


switch ($request_path) {
  case '':
  case '/':
    require __DIR__ . '/views/home.php';
    break;

  case '/checkout':
    require __DIR__ . '/views/checkout.php';
    break;

  case '/product-page':
    require __DIR__ . '/views/product-page.php';
    break;

  case '/my-cart':
    require __DIR__ . '/views/my-cart.php';
    break;

  // 404 if URI doesn't match a page
  default:
    require '404.php';
}



