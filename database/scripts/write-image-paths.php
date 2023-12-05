<?php

// connect to DB
require __DIR__ . '/../dbconnect.php';

// get all products
$productQuery = $db->query('SELECT * FROM products');

$products = $productQuery->fetchAll(PDO::FETCH_ASSOC);

// create csv file
$file = fopen("prod-images.txt", "w");

// write header row
fwrite($file, "prod_id,img_path\n");

// write path to images for each product id
foreach($products as $product => $field) {
  $img_path = 'images/product-photos/' . $field['brand'] . "/" . $field['prim_color'] . "-" . $field['sec_color'];
  fwrite($file, $field['prod_id'] . "," . $img_path . "/back.webp\n");
  fwrite($file, $field['prod_id'] . "," . $img_path . "/left.webp\n");
  fwrite($file, $field['prod_id'] . "," . $img_path . "/pair.webp\n");
  fwrite($file, $field['prod_id'] . "," . $img_path . "/right.webp\n");
  fwrite($file, $field['prod_id'] . "," . $img_path . "/top.webp\n");
}

fclose($file);

$db = null;

?>