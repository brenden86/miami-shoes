<?php

// AUTOLOAD CLASSES

spl_autoload_register(function ($class) {
  require __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
});

$uri = $_SERVER['REQUEST_URI'];

$page_routes = array(
  "/" => "/pages/home/home.php",
  "/404" => "/pages/404/404.php",
  "/return-policy" => "/pages/return-policy/return-policy.php"
);

$router = new models\Router();
$router->register_routes($page_routes);

// debugging
$uri = '/';

// echo $_SERVER['DOCUMENT_ROOT'];

try {
  $router->route_request($uri);
} catch (Error $e) {
  echo "Could not route request: " . $e->getMessage();
}