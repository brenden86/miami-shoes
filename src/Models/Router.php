<?php
namespace MiamiShoes\Models;

class Router {

  private $routes = [];

  public function register_routes($routes_array = []) {
    if($routes_array) {
      $this->routes += $routes_array;
    } else {
      echo "Please provide routes.";
    }
  }

  public function get_routes() {
    return $this->routes;
  }

  public function route_request($uri) {

    if(gettype($uri) !== 'string') {
      throw new \Error('URI not a string.');
    }
    if($this->get_routes()[$uri]) {
      require $_SERVER['DOCUMENT_ROOT'] . $this->get_routes()[$uri];
    } else {
      require $_SERVER['DOCUMENT_ROOT'] . '/Views/404/404.php';
    }
  }
}