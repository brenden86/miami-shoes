<?php

// load db config constants
require(__DIR__ . '/../config.php');

$dbname = 'miami_shoes';
$dsn = "mysql:host=" . DB_HOST . ";dbname=$dbname";

try {
  $db = new PDO($dsn, DB_USER, DB_PASS);
} catch (Exception $e) {
  echo $e->getMessage();
}

?>