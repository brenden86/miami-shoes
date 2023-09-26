
<?php

/*
  Script for handling query parameters for product search
*/

include_once __DIR__ . '/../database/dbconnect.php';

function getProductSqlParams() {
  
  global $db;

  // create array of parameters to be joined into SQL WHERE clause
  $params_array = [];
  
  // handle GENDER

  if(isset($_REQUEST['mens']) && isset($_REQUEST['womens'])) {
    // unisex
    $condition = 'gender = 0';
    array_push($params_array, $condition);
  } elseif(isset($_REQUEST['mens'])) {
    // only mens
    $condition = 'gender = 1';
    array_push($params_array, $condition);
  } elseif(isset($_REQUEST['womens'])) {
    // only womens
    $condition = 'gender = 2';
    array_push($params_array, $condition);
  }
  
  // handle COLOR
  
  if(preg_match('/filter-color-/', $_SERVER['REQUEST_URI'])) {
    
    // get filter colors from DB to compare
    $filter_colors = $db->queryAndFetch('SELECT DISTINCT filter_color, filter_hex FROM prod_colors');
    
    // initialize array for selected colors
    $selected_colors = [];
    
    // check filter colors in DB against selected colors
    foreach($filter_colors as $color) {
      if(isset($_REQUEST['filter-color-'.$color['filter_color']])) {
        // push colors with quotes to format for SQL clause
        array_push($selected_colors, '"'.$color['filter_color'].'"');
      }
    }
    
    $condition = 'filter_color IN (' . implode(', ', $selected_colors) . ")";
    array_push($params_array, $condition);
    
  }
  
  // handle PRICE
  
  $min_price = intval($_REQUEST['priceMin']);
  $max_price = intval($_REQUEST['priceMax']);
  
  if(
    ($min_price && $max_price) && // both exist and are > 0
    ($min_price <= $max_price)
    ) {
      $condition = '(price >= '.$min_price.' AND price <= '.$max_price.')';
      array_push($params_array, $condition);
    } elseif ($min_price && !$max_price) {
      $condition = 'price >= '.$min_price;
      array_push($params_array, $condition);
    } elseif (!$min_price && $max_price) {
      $condition = 'price <= '.$max_price;
      array_push($params_array, $condition);
  }

  // handle SHOE TYPE

  if(preg_match('/type-filter-/', $_SERVER['REQUEST_URI'])) {
    $selected_shoe_types = [];
    // get types from request
    foreach($_REQUEST as $key => $val) {
      if(preg_match('/^type-filter/', $key)) {
        array_push($selected_shoe_types, $val);
      }
    }
    
    // get stocked shoe types
    $stocked_shoe_types = $db->queryAndFetch('
      SELECT DISTINCT shoe_type
      FROM stock
      LEFT JOIN products USING(prod_id)
    '); 
    $shoe_types = [];
    
    // validate types input against stocked items
    foreach($stocked_shoe_types as $type) {
      if(in_array($type['shoe_type'], $selected_shoe_types)) {
        // if type matches stocked types, add to query
        array_push($shoe_types, '"'.$type['shoe_type'].'"');
      }
    }
    
    $condition = 'shoe_type IN (' . implode(', ', $shoe_types) . ")";
    array_push($params_array, $condition);
  }
    
    
  // handle BRANDS
  
  if(preg_match('/brand-filter-/', $_SERVER['REQUEST_URI'])) {

    $selected_brands = [];
    // get brands from request
    foreach($_REQUEST as $key => $val) {
      if(preg_match('/^brand-filter/', $key)) {
        array_push($selected_brands, $val);
      }
    }
    
    //
    $stocked_brands = $db->queryAndFetch('
      SELECT DISTINCT brand
      FROM stock
      LEFT JOIN products USING(prod_id)
    ');
    
    $brands = [];
    
    // validate brands against stock
    foreach($stocked_brands as $brand) {
      if(in_array($brand['brand'], $selected_brands)) {
        // if brand is in DB, add to query
        array_push($brands, '"'.$brand['brand'].'"');
      }
    }
    
    $condition = 'brand IN (' . implode(', ', $brands) . ")";
    array_push($params_array, $condition);
    
  }

  // assemble SQL WHERE clause
  if(count($params_array) > 0) {
    return 'WHERE ' . implode(' AND ', $params_array);
  } else {
    return;
  }
    
  }
  
  
  
  /*
    - REMOVING SIZE -
    probably not needed as a filter. saving code in case I change my mind.

  
  // handle SIZE
  
  // get sizes from request
  $req_sizes = [];
  foreach($_REQUEST as $key => $val) {
    if(preg_match('/^size-/', $key)) {
      // only keep number & decimal
      array_push(
        $req_sizes, 
        preg_replace(
          '/_/',
          ".",
          preg_replace('/size-/', "", $key)
          )
        );
      }
    }
    
    $stock_sizes = getAllSizes();
    $sizes = [];
    
    // validate sizes against DB
    foreach($req_sizes as $size) {
      if(in_array($size, $stock_sizes)) {
        array_push($sizes, $size);
      }
    }
    
    $condition = 'size IN (' . implode(', ', $selected_colors) . ")";

  */
  ?>