<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Miami Shoes | Home</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="styles/main.css">
  <script src="./js/modules/image-fallback.js" defer></script>
  <script src="./js/modules/validate-filters.js" async></script>
  <script src="./js/modules/show-hide-update-filters.js" async></script>
  
</head>
<body>
  <div id="root">

  <?php
    // IMPORT PHP FUNCTIONS
    include_once __DIR__ . '/../database/dbconnect.php';
    include_once __DIR__ . '/../php-scripts/get-sql-params.php';
    include_once __DIR__ . '/../php-scripts/get-product-info.php';

  ?>
    
<!----------- 
    HEADER    
------------->
<?php include('./header.php');?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">

    <!-- Filter sidebar -->
    <?php include_once './filter-sidebar.php'?>
    
    <!-- main content column -->
    <div class="main-content">
      
      <!-- Product search results -->
      <div class="content-block">

      <?php

        // handle IN STOCK filter
        // if(isset($_REQUEST['inStock'])) {
        //   $in_stock = 'HAVING COUNT(inventory.sku) > 0';
        // } else {
        //   $in_stock = '';
        // }

        // get products
        $products = $db->queryAndFetch('
          SELECT
            products.prod_id AS prod_id,
            prod_name,
            thumb_url,
            brand,
            price,
            inventory.qty_in_stock AS qty_in_stock,
            order_items.qty_ordered AS qty_ordered,
            avail_date
          FROM products
          LEFT JOIN (
            SELECT prod_id, count(prod_id) AS qty_in_stock
            FROM inventory
            LEFT JOIN stock USING(sku)
            GROUP BY prod_id
          ) AS inventory ON products.prod_id = inventory.prod_id
          LEFT JOIN (
            SELECT prod_id, count(prod_id) AS qty_ordered
            FROM order_items
            LEFT JOIN stock USING(sku)
            GROUP BY prod_id
          ) AS order_items ON products.prod_id = order_items.prod_id
          ' . getProductSqlParams() . '
          ORDER BY qty_ordered DESC
        ');
        
        // if no products are found, display message
        if(count($products) < 1) {
          echo '
          <div class="no-products-message">
            <h1>No products found</h1>
            <p>Sorry, we didn\'t find any products matching your search.</p>
          </div>
          ';
        } else {
          echo '
           <div class="product-card-container card">
            <div class="product-cards">
          ';
          
          $prod_per_page = 20;
          $num_pages = ceil(count($products) / $prod_per_page);

          // get current page from request
          if(intval($_REQUEST['page'] > 0)) {
            if(intval($_REQUEST['page'] > $num_pages)) {
              // if page provided is greater than total pages, go to last page
              $current_page = $num_pages;
            } else {
              $current_page = $_REQUEST['page'];
            }
          } else {
            $current_page = 1;
          }
          
          $start_prod_index = $prod_per_page * ($current_page - 1);
          $end_prod_index = $start_prod_index + $prod_per_page;
          // loop through products on page
          for($i=$start_prod_index; $i<$end_prod_index; $i++) {
            
            // extract variables from array

            extract($products[$i]);
            
            echo '
            <div class="product-card-wrapper">
            <a href="/product-page.php?id=' . $prod_id . '" class="product-card">'
              . getProductCardBadge($products[$i]) . '
              <div class="product-card-image">
                <img src="' . $thumb_url . '" alt="' . $brand . ' ' . $prod_name . '">
              </div>

              <div class="product-colors-wrapper">';
              // get color variants for current product
              $color_variants = $db->getColorVariants($prod_name);
              
              // loop through variants
              foreach($color_variants as $color) {
                
                // GET HEX VALUES FOR COLOR BLOCKS
                
                // prepare statements
                $prim_hex_query = $db->prepare('SELECT color_hex FROM prod_colors WHERE color_name = :primcolor');
                $sec_hex_query = $db->prepare('SELECT color_hex FROM prod_colors WHERE color_name = :seccolor');
                // execute queries
                $prim_hex_query->execute(['primcolor' => $color['prim_color']]);
                $sec_hex_query->execute(['seccolor' => $color['sec_color']]);
                // fetch results
                $prim_hex = $prim_hex_query->fetch(PDO::FETCH_ASSOC);
                $sec_hex = $sec_hex_query->fetch(PDO::FETCH_ASSOC);
                
                // set secondary hex equal to primary if there is no secondary color
                if (!$sec_hex) {
                  $sec_hex = $prim_hex;
                }
                
                echo '
                <div class="product-color">
                <div class="color-swatch primary" style="background: #' . $prim_hex['color_hex'] . '"></div>
                <div class="color-swatch secondary" style="background: #' . $sec_hex['color_hex'] . '"></div>
                </div>
                
                ';
              }
                  
              echo '</div>
              <div class="product-info">
                <div class="brand">' . strtoupper($brand) . '</div>
                <div class="product-name">' . strtoupper($prod_name) . '</div>
                <div class="price">$' . $price . '</div>
                </div>
                </a>
                </div>
                '; // END ECHO

              // break out of loop if on last product but products per page limit not reached.
              if($i === count($products) - 1) {
                break;
              }
                
                // END for loop
              }

              // END product card container divs
              echo '
                </div>
                </div>
              ';
            }
          ?>




</div>
<!-- pagination start -->
<?php
  // pagination
  include_once __DIR__ . '/pagination.php';
?>
<!-- pagination end -->

    
    </div>
  </div>


</main>

<!----------- 
    FOOTER    
------------->
<?php include('./footer.php');?>

<?php
  $db = null;
?>

</div>
</body>
</html>