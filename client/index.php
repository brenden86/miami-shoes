<?php

// AUTOLOAD CLASSES
spl_autoload_register(function ($class) {
  require __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
});

$uri = $_SERVER['REQUEST_URI'];

$page_routes = array(
    "/" => "/pages/home/home.php",
    "/404" => "/pages/404/404.php",
    "/return-policy" => "/pages/return-policy/return-policy.php",
    "/products" => "/pages/products/products.php",
    "/cart" => "/pages/my-cart/my-cart.php",
    "/checkout" => "/pages/checkout/checkout.php",
    "/checkout-submit" => "/pages/checkout/checkout-submit.php",
    "/faq" => "/pages/faq/faq.php",
    "/order-submit" => "/pages/checkout/order-submit.php",
    "/order-confirmation" => "/pages/order-confirmation/order-confirmation.php",
);

$router = new models\Router();
$router->register_routes($page_routes);

// serve correct page based on provided path
try {
  $router->route_request($uri);
} catch (Error $e) {
  echo "Could not route request: " . $e->getMessage();
}