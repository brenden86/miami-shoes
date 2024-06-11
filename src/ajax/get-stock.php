<?php

// script that gets the quantity in stock of an SKU

include_once '../../database/dbconnect.php';

$response = array(
  'status' => 'failure',
  // default to failure status
);

try {

  if(isset($_GET['sku'])) {
    $query = $db->prepare('SELECT count(sku) AS qty FROM inventory WHERE sku = :sku');
    $query->execute(['sku' => $_GET['sku']]);
    $qty = $query->fetch(PDO::FETCH_ASSOC);
    $response['data'] = $qty;
    $response['status'] = 'success';
  }

} catch (Error $e) {
  $response['message'] = $e->getMessage();
}

$db = null;

header("Content-Type: application/json");
echo json_encode($response);
exit();

?>