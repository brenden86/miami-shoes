<?php

// functions for querying product info for items in cart

include_once __DIR__ . '/../database/dbconnect.php';

function getCartItemsFromCookie() {

  // get product SKUs from cart cookie and query database for product information

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
          gender,
          count(inventory.sku) AS qty
        FROM stock
        LEFT JOIN inventory USING(sku)
        LEFT JOIN products USING(prod_id)
        WHERE sku = :sku
        GROUP BY sku;
      ');
      $cart_item_query->execute(['sku' => $item]);
      $cart_item = $cart_item_query->fetch(PDO::FETCH_ASSOC);

      array_push($cart_items_array, $cart_item);

    }

    return $cart_items_array;

  }

}

function getCartSubtotal() {

// returns total price of all SKUs in cart

global $db;

  // get prices from DB
  $item_prices = array();
  $cart_items = json_decode($_COOKIE['cart-items']);

  foreach($cart_items as $sku) {
    try {
      $price_query = $db->prepare('SELECT price FROM stock LEFT JOIN products USING(prod_id) WHERE sku = :sku');
      $price_query->execute(['sku' => $sku]);
      $item_price = $price_query->fetch();
      array_push($item_prices, $item_price['price']);
    } catch(Error $e) {
      return 'an error occurred.';
    }
  }
  return array_sum($item_prices);
}


function getShippingCost($ship_type) {

  // return shipping cost from DB based on shipping type selected (free or expedited)

  global $db;

  $ship_cost_query = $db->prepare('SELECT ship_cost FROM shipping_costs WHERE ship_type = :ship_type');
  $ship_cost_query->execute(['ship_type' => $ship_type]);
  $ship_cost = $ship_cost_query->fetch();

  return $ship_cost[0];
  
}

function getTaxRate($state) {

  // return tax rate for state items are purchased in
  
  global $db;
  
  $sales_tax_query = $db->prepare('SELECT tax_rate FROM tax_rates WHERE state = :state');
  $sales_tax_query->execute(['state' => $state]);
  $tax_rate = $sales_tax_query->fetch();
  
  return $tax_rate[0];

}

?>