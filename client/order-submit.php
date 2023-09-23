<?php
  session_start();

  include_once __DIR__ . '/../database/dbconnect.php';
  include_once __DIR__ . '/../php-scripts/get-order-info.php';

  // set timezone to US

  // on error, send back to checkout page with error message.
  function orderError($message) {
    $_SESSION['order_error'] = $message;
    header('location: /client/checkout.php');
    exit;
  }

  // if checkout step is not at least 3 (review step), data has not been validated yet.
  if($_SESSION['checkout_info']['current_step'] < 3) {
    orderError('Something went wrong, please check your information and try again.');
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
      $order_items_query->execute(['id' => $order_id, 'sku' => $item['sku']]);
    }

    $_SESSION['order_submitted'] = true;    


  } catch(Exception $e) {
    orderError('Sorry, we were unable to complete your order. Please double check your information and try again.<br>' . $e->getMessage());
  }


  header('location: /client/order-confirmation.php');
  exit;

?>