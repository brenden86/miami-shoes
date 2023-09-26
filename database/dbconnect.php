<?php

// load db config constants
require(__DIR__ . '/../config.php');

$dbname = 'miami_shoes';
$dsn = "mysql:host=" . DB_HOST . ";dbname=$dbname";

// extend PDO class so that I can add custom methods
class DB extends PDO {

  // function for simple query
  function queryAndFetch($sql) {
    $query = $this->query($sql);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  // get color variants for product by name
  function getColorVariants($prod_name) {
    $query = $this->prepare('SELECT prod_id, prim_color, sec_color FROM products WHERE prod_name = :name');
    $query->execute(['name' => $prod_name]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // get sizes of shoe that are in stock
  function getSizesInStock($prod_id) {
    $query = $this->prepare('
      SELECT
        sku,
        prod_id,
        size,
        count(inventory.sku) AS qty
      FROM stock
      LEFT JOIN inventory USING(sku)
      WHERE prod_id = :id
      GROUP BY sku
    ');
    $query->execute(['id' => $prod_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // get details for product
  function getProductDetails($prod_id) {
    $query = $this->prepare('SELECT prod_detail FROM prod_details WHERE prod_id = :id');
    $query->execute(['id' => $prod_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

}

try {
  $db = new DB($dsn, DB_USER, DB_PASS);
} catch (Exception $e) {
  echo $e->getMessage();
}


?>