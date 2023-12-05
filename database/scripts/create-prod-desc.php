<?php

// connect to DB
require __DIR__ . '/../dbconnect.php';

// get all products
$productQuery = $db->query('SELECT prod_id FROM products WHERE prod_id > 90');

$products = $productQuery->fetchAll(PDO::FETCH_ASSOC);

// create csv file
$file = fopen("product-descriptions.txt", "w");

// write header row
fwrite($file, "prod_id,prod_desc\n");

// write path to images for each product id
foreach($products as $product => $field) {
  fwrite($file, $field['prod_id'] . "," . "Product description 1\n");
  fwrite($file, $field['prod_id'] . "," . "Product description 2\n");
  fwrite($file, $field['prod_id'] . "," . "Product description 3\n");
  fwrite($file, $field['prod_id'] . "," . "Product description 4\n");
  fwrite($file, $field['prod_id'] . "," . "Product description 5\n");
}

fclose($file);

$db = null;

?>