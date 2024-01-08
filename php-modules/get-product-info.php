<?php

  // functions for generating dynamic product information that is not queried directly from DB

  function slugify($slug) {
    // return SEO-friendly URL slug; replaces period or whitespace with hyphen for URL
    return preg_replace('/(\.|\s)+/', '-', $slug);
  }

  function buildProductTitle($product) {

    // returns product title that includes gender and shoe type

    extract($product);

    // handle gender
    if ($gender == 1) {
      $gender_text = "mens ";
    } else if ($gender == 2) {
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
    
    // returns HTML markup for links to previous levels of product search 'hierarchy'

    extract($product);
    
    // get gender text
    if ($gender == 1) {
      $gender_text = "mens";
    } elseif ($gender == 2) {
      $gender_text = "womens";
    }

    // build breadcrumbs
    if ($gender != 0) {
      return
        '<a href="/products?'. $gender_text .'=true" class="text-button">'.$gender_text.'</a>
        <i class="bi-chevron-right" role="presentation"></i>
        <a href="/products?'. $gender_text . '=true&type-filter-'.$shoe_type.'='.$shoe_type.'" class="text-button">'.$shoe_type.'</a>
        ';
    } else {
      return '<a href="/products?type-filter'.$shoe_type.'='.$shoe_type.'" class="text-button">'.$shoe_type.'</a>';
    }

  }

  function getProductColorNames($product) {

    // returns string of the product's primary and (if applicable) secondary color

    $color_name = $product['prim_color'];
    if ($product['sec_color'] != '') {
      $color_name .= '/' . $product['sec_color'];
    }
    return strtoupper($color_name);
  }


  function getProductCardBadge($product) {
    
    // returns HTML for badge to indicate a special status

    if($product['qty_in_stock'] < 1) {
      // OUT OF STOCK
      return '<div class="badge no-stock">out of stock</div>';

    } elseif ($product['qty_in_stock'] <= 20) {
      // LOW STOCK 
      return '<div class="badge low-stock">low stock</div>';

    } elseif(
      $product['avail_date'] > date('Y-m-d H:i:s', strtotime('today - 30 days')) &&
      $product['avail_date'] <= date('Y-m-d H:i:s')
      ) {
      // NEW - displayed if first available date is within last 30 days
      return '<div class="badge">new</div>';
    }
  }


  function getProductColorsCount($field) {

    // return string of the number of other color variants for a product

    if($field['num_colors'] > 1) {
      return '<div class="colors-text">' . $field['num_colors'] . ' colors</div>';
    } else {
      return '';
    }
  }
  
  ?>