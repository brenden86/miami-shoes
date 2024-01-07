<?php
  session_start();

  include_once '../../../database/dbconnect.php';
  include_once '../../../php-modules/get-order-info.php';

  // on error, send back to checkout page with error message.
  function orderError($message) {
    $_SESSION['order_error'] = $message;
    header('location: /checkout');
    exit;
  }

  // if checkout step is not at least 3 (review step), data has not been validated yet.
  if($_SESSION['checkout_info']['current_step'] < 3) {
    orderError('Something went wrong, please check your information and try again.');
  }

  // prevent order submit if any items are out of stock

  // get SKUs from cart items
  $skus = array();
  foreach($_SESSION['cart_items'] as $item) {
    array_push($skus, $item['sku']);
  }

  // get quantity of each sku in cart (most likely one, but
  // just in case someone orders multiple products of same size)

  $sku_counts = array_count_values($skus);
  foreach($sku_counts as $sku => $count) {
    // check qty of sku in stock
    $qty_in_stock = $db->getQtyInStock($sku);
    if($qty_in_stock < $count) {
      // get product name for order error message
      $product = $db->queryAndFetch('SELECT prod_name, brand FROM products LEFT JOIN stock USING(prod_id) WHERE sku = ' . $sku);
      orderError('Sorry, the quantity of ' . strtoupper($product[0]['brand'] . ' ' . $product[0]['prod_name']) . ' in stock is not sufficient to fulfill this order.');
    }
  }

  ////////////////////////
  //    SUBMIT ORDER    //
  ////////////////////////

  // insert order into DB
  try {
    $_SESSION['checkout_info']['order_id'] = generateOrderId();
    $_SESSION['checkout_info']['dlvr_date'] = getDeliveryDate($_SESSION['checkout_info']['shipping_type']);
    $order_sql = '
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
      )
    ';
    $order_query = $db->prepare($order_sql);
    $order_query->execute([
      'order_id' => $_SESSION['checkout_info']['order_id'],
      'order_date' => date("Y-m-d H:i:s"),
      'dlvr_date' => $_SESSION['checkout_info']['dlvr_date'],
      'email' => $_SESSION['checkout_info']['email'],
      'phone' => $_SESSION['checkout_info']['phone'],
      'bill_fist_name' => $_SESSION['checkout_info']['billing_first_name'],
      'bill_last_name' => $_SESSION['checkout_info']['billing_last_name'],
      'bill_comp' => $_SESSION['checkout_info']['billing_company'],
      'bill_street' => $_SESSION['checkout_info']['billing_street1'],
      'bill_street2' => $_SESSION['checkout_info']['billing_street2'],
      'bill_city' => $_SESSION['checkout_info']['billing_city'],
      'bill_state' => $_SESSION['checkout_info']['billing_state'],
      'bill_zip' => $_SESSION['checkout_info']['billing_zip'],
      'ship_comp' => $_SESSION['checkout_info']['shipping_company'],
      'ship_first_name' => $_SESSION['checkout_info']['shipping_first_name'],
      'ship_last_name' => $_SESSION['checkout_info']['shipping_last_name'],
      'ship_street' => $_SESSION['checkout_info']['shipping_street1'],
      'ship_street2' => $_SESSION['checkout_info']['shipping_street2'],
      'ship_city' => $_SESSION['checkout_info']['shipping_city'],
      'ship_state' => $_SESSION['checkout_info']['shipping_state'],
      'ship_zip' => $_SESSION['checkout_info']['shipping_zip'],
      'ship_type' => $_SESSION['checkout_info']['shipping_type'],
      'dlvr_instr' => $_SESSION['checkout_info']['delivery_instructions'],
      'ordr_subtotal' => $_SESSION['checkout_info']['cart_subtotal'],
      'ship_cost' => $_SESSION['checkout_info']['shipping_cost'],
      'ordr_taxes' => $_SESSION['checkout_info']['sales_tax']
    ]);
    
    // insert order items into DB
    foreach($_SESSION['cart_items'] as $item) {
      $order_items_sql = 'INSERT INTO order_items(order_id, sku) VALUES(:id, :sku)';
      $order_items_query = $db->prepare($order_items_sql);
      $order_items_query->execute(['id' => $_SESSION['checkout_info']['order_id'], 'sku' => $item['sku']]);
    }

    // remove items from inventory
    foreach($skus as $sku) {
      $query = $db->prepare('DELETE FROM inventory WHERE sku = :sku LIMIT 1');
      $query->execute(['sku' => $sku]);
    }

    $_SESSION['order_submitted'] = true;
    
    // clear cart items cookie
    setcookie('cart-items', '', time() - 3600, '/');


  } catch(Exception $e) {
    orderError('Sorry, we were unable to complete your order. Please double check your information and try again.<br>' . $e->getMessage());
  }


  header('location: /order-confirmation');
  exit;

?>