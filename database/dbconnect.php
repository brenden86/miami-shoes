<?php

// load db environment variables
// require __DIR__ . '/../config.php';
$env = parse_ini_file(__DIR__ . '/../.env');

$dsn = "mysql:host=" . $env['DB_HOST'] . ";dbname=" . $env['DB_NAME'];

// extend PDO class so that I can add custom methods
class DB extends PDO {

  // function for simple query
  function queryAndFetch($sql) {
    try {
      $query = $this->query($sql);
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  // get color variants for product by name
  function getColorVariants($prod_name, $gender) {
    try {
      $query = $this->prepare('SELECT prod_id, prim_color, sec_color FROM products WHERE prod_name = :name AND gender = :gender');
      $query->execute(['name' => $prod_name, 'gender' => $gender]);
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  // get sizes of shoe that are in stock
  function getSizesInStock($prod_id) {
    try {
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
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  // get details for product
  function getProductDetails($prod_id) {
    try {
      $query = $this->prepare('SELECT prod_detail FROM prod_details WHERE prod_id = :id');
      $query->execute(['id' => $prod_id]);
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  // get quantity in stock of sku
  function getQtyInStock($sku) {
    try {
      $query = $this->prepare('SELECT count(sku) AS qty FROM inventory WHERE sku = :sku');
      $query->execute(['sku' => $sku]);
      $qty = $query->fetch(PDO::FETCH_ASSOC);
      return $qty['qty'];
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}

try {
  $db = new DB($dsn, $env['DB_USER'], $env['DB_PASS']);
} catch (Exception $e) {
  echo $e->getMessage();
}


?>