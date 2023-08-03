<?php

function getCartSubtotal() {

  global $db;

  

    // get prices from DB
    $item_prices = array();
    $cart_items = json_decode($_COOKIE['cart-items']);

    foreach($cart_items as $item) {
      $price_query = $db->prepare('SELECT price FROM stock LEFT JOIN products USING(prod_id) WHERE sku = :sku');
      $price_query->execute(['sku' => $item]);
      $item_price = $price_query->fetch();
      array_push($item_prices, $item_price['price']);
    }

    return '$' . array_sum($item_prices);
  }



?>