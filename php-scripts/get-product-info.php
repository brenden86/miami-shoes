<?php

  function buildProductTitle($product) {

    // extract product properties to variables
    extract($product);

    // handle gender
    if ($gender = 1) {
      $gender_text = "mens ";
    } else if ($gender = 2) {
      $gender_text = "womens ";
    } else {
      $gender_text = "";
    }

    // handle shoe type; append "shoe" to shoe type where it makes sense
    if ($shoe_type === 'sneaker' || $shoe_type === 'boot') {
      $type_text = $shoe_type;
    } else {
      $type_text = $shoe_type . " shoe";
    }

    // concatenate title
    return $gender_text . $prod_name . " " . $type_text;
    
  }




  function buildBreadcrumbs($product) {
    
    // extract product properties to variables
    extract($product);
    
    // get gender text
    if ($gender === 1) {
      $gender_text = "mens";
    } elseif ($gender === 2) {
      $gender_text = "womens";
    }

    // build breadcrumbs
    if ($gender != 0) {
      return
        '<a href="/client/product-search.php?gender='.$gender.'" class="text-button">'.$gender_text.'</a>
        <i class="bi-chevron-right"></i>
        <a href="/client/product-search.php?gender='.$gender.'&type-filter-'.$shoe_type.'='.$shoe_type.'" class="text-button">'.$shoe_type.'</a>
        ';
    } else {
      return '<a href="/client/product-search.php?type-filter'.$shoe_type.'='.$shoe_type.'" class="text-button">'.$shoe_type.'</a>';
    }


  }

  function getProductColorNames($product) {
    $color_name = $product['prim_color'];
    if ($product['sec_color'] != '') {
      $color_name .= '/' . $product['sec_color'];
    }
    return strtoupper($color_name);
  }


  // adds badge to product card if necessary
  function getProductCardBadge($product) {

    extract($product);

    if($product['qty'] < 1) {
      // OUT OF STOCK
      return '<div class="badge no-stock">out of stock</div>';

    } elseif ($product['qty'] <= 20) {
      // LOW STOCK 
      return '<div class="badge low-stock">low stock</div>';

    } elseif(
      $avail_date > date('Y-m-d', strtotime('today - 30 days')) &&
      $avail_date <= date('Y-m-d')
      ) {
      // NEW - displayed if first available date is within last 30 days
      return '<div class="badge">new</div>';
    }
  }
  
  ?>