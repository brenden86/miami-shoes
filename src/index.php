<?php
include __DIR__ . '/../vendor/autoload.php';
$env = parse_ini_file(__DIR__ . '/../.env');

use MiamiShoes\Models\Router;

$uri = $_SERVER['REQUEST_URI'];

$page_routes = array(
    "/" => "/Views/Home/Home.php",
    "/404" => "/Views/404/404.php",
    "/return-policy" => "/Views/ReturnPolicy/ReturnPolicy.php",
    "/products" => "/Views/Products/Products.php",
    "/cart" => "/Views/MyCart/MyCart.php",
    "/checkout" => "/Views/Checkout/Checkout.php",
    "/checkout-submit" => "/Views/checkout/checkout-submit.php",
    "/faq" => "/Views/Faq/Faq.php",
    "/order-submit" => "/Views/checkout/order-submit.php",
    "/order-confirmation" => "/Views/OrderConfirmation/OrderConfirmation.php",
);

$router = new Router();
$router->register_routes($page_routes);

// serve correct page based on provided path
try {
  $router->route_request($uri);
} catch (Error $e) {
  echo "Could not route request: " . $e->getMessage();
}