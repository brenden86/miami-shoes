<?php

function getCartItems() {

  global $db;

  if(isset($_COOKIE['cart-items']) && count(json_decode($_COOKIE['cart-items'])) > 0) {

    $cart_items = json_decode($_COOKIE['cart-items']);
    $cart_items_array = array();

    foreach($cart_items as $item) {

      // query each cart item's info and push to new array

      $cart_item_query = $db->prepare('
      SELECT
        sku,
        thumb_url,
        prod_name,
        prod_id,
        price,
        prim_color,
        sec_color,
        size,
        gender
      FROM stock
      LEFT JOIN products USING(prod_id)
      WHERE sku = :sku
      ');
      $cart_item_query->execute(['sku' => $item]);
      $cart_item = $cart_item_query->fetch(PDO::FETCH_ASSOC);

      array_push($cart_items_array, $cart_item);

    }

    return $cart_items_array;

  }

}

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