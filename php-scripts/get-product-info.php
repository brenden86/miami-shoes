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
        <a href="/client/product-search.php?gender='.$gender.'&q='.preg_replace('/\s/', '+', $prod_name).'" class="text-button">'.$prod_name.'</a>
        ';
      } else {
        return '<a href="/client/product-search.php?gender='.$gender.'&q='.preg_replace('/\s/', '+', $prod_name).'" class="text-button">'.$prod_name.'</a>';
    }

  }





  function buildColorBlocks($product) {
    
    // use DB connection
    include __DIR__ . '/../database/dbconnect.php';
    
    // extract properties from product
    extract($product);
    
    // get color variants for current product
    $color_variants_query = $db->prepare('SELECT prod_id, prim_color, sec_color FROM products WHERE prod_name = :name');
    $color_variants_query->execute(['name' => $prod_name]);
    $color_variants = $color_variants_query->fetchAll(PDO::FETCH_ASSOC);
    
    // get hex values from DB
    $color_hex_query = $db->query('SELECT color_name, color_hex FROM prod_colors');
    $color_hex_array = $color_hex_query->fetchAll(PDO::FETCH_ASSOC);
    
    // create array of color hex values
    foreach($color_hex_array as $color) {
      $color_hex_values[$color['color_name']] = $color['color_hex'];
    }
    
    // loop through variants, return color block HTML
    foreach($color_variants as $variant) {
      
      // set selected class
      if ($variant['prim_color'] === $prim_color && $variant['sec_color'] === $sec_color) {
        $selected = 'selected';
      } else {
        $selected = '';
      }
      
      echo '
      <a
      href="/client/product-page.php?id=' . $variant['prod_id'] . '"
      class="product-color '.$selected.'"
      >
      <div class="color-swatch primary" style="background: #'.$color_hex_values[$variant['prim_color']].'"></div>
      <div class="color-swatch secondary" style="background: #'.$color_hex_values[$variant['sec_color']].'"></div>
      </a>
      ';
    }
    
    // terminate DB connection
    $db = null;
  }
  




  function getSizes($product) {
    
    // use DB connection
    include __DIR__ . '/../database/dbconnect.php';

    // extract properties from product
    extract($product);
    
    
    $sql = 'SELECT sku, prod_id, size, count(inventory.sku) AS qty FROM stock LEFT JOIN inventory USING(sku) WHERE prod_id = :id GROUP BY sku';
    $sizes_query = $db->prepare($sql);
    $sizes_query->execute(['id' => $prod_id]);
    $sizes = $sizes_query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($sizes as $item) {

      // set disabled if no qty in inventory
      if ($item['qty'] < 1) {
        $disabled = 'disabled';
      } else {
        $disabled = '';
      }
      
      // format size text to remove decimal for whole numbers
      if ($item['size'] - floor($item['size']) > 0) {
        $size_text = $item['size'];
      } else {
        $size_text = round($item['size'], 0);
      }
      
      echo '
      <div class="size-container">
      <input id="size-'.$item['size'].'" type="radio" name="size" ' . $disabled . '>
      <label for="size-'.$item['size'].'" class="radio">'.$size_text.'</label>
      </div>
      ';
      
    }
    
    // terminate connection
    $db = null;
  }
  
  




  
  function getDetails($product) {
    
    // use DB
    include __DIR__ . '/../database/dbconnect.php';

    // extract properties from product
    extract($product);

    // get details from DB
    $sql = 'SELECT prod_detail FROM prod_details WHERE prod_id = :id';
    $details_query = $db->prepare($sql);
    $details_query->execute(['id' => $prod_id]);
    $details = $details_query->fetchAll(PDO::FETCH_ASSOC);

    // iterate & echo details
    foreach($details as $detail) {
      echo '<li>' . $detail['prod_detail'] . '</li>';
    }

    // terminate DB connection
    $db = null;

  }
  
  ?>