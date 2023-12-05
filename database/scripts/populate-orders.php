<?php

include_once __DIR__ . '/../dbconnect.php';
include_once __DIR__ . '/../../php-scripts/get-order-info.php';

// function for getting random sequence of SKUs for populating
// orders table with sample data
function getSampleItems() {
  $items = array();
  $num_of_items = rand(1, 5);
  for($i = 0; $i < $num_of_items; $i++) {
    array_push($items, rand(1, 2820));
  }
  return $items;
}

$orders_to_enter = 200;

$prompt = 'This will enter ' . $orders_to_enter . ' orders into the DB. Type "y" to continue.';
$continue = readline($prompt);

if($continue === "y") {

  echo 'inserting orders...';

  for($i = 0; $i < $orders_to_enter; $i++) {

    $order_id = generateOrderId();
    $query = $db->prepare('
    INSERT INTO orders (
      order_id,
      order_date,
      dlvr_date,
      email,
      phone,
      bill_first_name,
      bill_last_name,
      bill_comp,
      bill_street,
      bill_street2,
      bill_city,
      bill_state,
      bill_zip,
      ship_comp,
      ship_first_name,
      ship_last_name,
      ship_street,
      ship_street2,
      ship_city,
      ship_state,
      ship_zip,
      ship_type,
      dlvr_instr,
      ordr_subtotal,
      ship_cost,
      ordr_taxes
    ) VALUES (
      :order_id,
      :order_date,
      :dlvr_date,
      :email,
      :phone,
      :bill_fist_name,
      :bill_last_name,
      :bill_comp,
      :bill_street,
      :bill_street2,
      :bill_city,
      :bill_state,
      :bill_zip,
      :ship_comp,
      :ship_first_name,
      :ship_last_name,
      :ship_street,
      :ship_street2,
      :ship_city,
      :ship_state,
      :ship_zip,
      :ship_type,
      :dlvr_instr,
      :ordr_subtotal,
      :ship_cost,
      :ordr_taxes
    )');
    $query->execute([
    'order_id' => $order_id,
    'order_date' => date("Y-m-d H:i:s"),
    'dlvr_date' => getDeliveryDate('standard'),
    'email' => 'sammy@sampler.com',
    'phone' => '555-555-5555',
    'bill_fist_name' => 'Sammy',
    'bill_last_name' => 'Sampler',
    'bill_comp' => null,
    'bill_street' => '123 MAIN ST',
    'bill_street2' => 'APT 3',
    'bill_city' => 'TULSA',
    'bill_state' => 'OK',
    'bill_zip' => '12345',
    'ship_comp' => null,
    'ship_first_name' => 'Sammy',
    'ship_last_name' => 'Sampler',
    'ship_street' => '123 MAIN ST',
    'ship_street2' => 'APT 3',
    'ship_city' => 'TULSA',
    'ship_state' => 'OK',
    'ship_zip' => '12345',
    'ship_type' => 'standard',
    'dlvr_instr' => 'sample data, NOT ACCURATE',
    'ordr_subtotal' => 100.00,
    'ship_cost' => 0,
    'ordr_taxes' => 8.75
    ]);

    // insert order items
    $random_order_items = getSampleItems();
    foreach($random_order_items as $item => $sku) {
      $order_items_sql = 'INSERT INTO order_items(order_id, sku) VALUES(:id, :sku)';
      $order_items_query = $db->prepare($order_items_sql);
      $order_items_query->execute(['id' => $order_id, 'sku' => $sku]);
    }
  
  }

  echo 'done.';
} else {
  echo 'operation cancelled';
}


?>