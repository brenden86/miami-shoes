<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products | Miami Shoes</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/styles/main.css">
  <script src="../../js/accessibility.js"></script>
  <script src="./app.js" type="module" defer></script>


  
</head>
<body>
  <div id="root">

  <?php
    // IMPORT PHP FUNCTIONS
    include_once '../../../database/dbconnect.php';
    include_once '../../../php-scripts/get-sql-params.php';
    include_once '../../../php-scripts/get-product-info.php';

  ?>
    
<!----------- 
    HEADER    
------------->
<?php include '../../components/header.php';?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper mobile-column">

    <?php
      // get sort order from request
      // default to sort by popular

      if(isset($_REQUEST['sort'])) {
        $_SESSION['sort_order'] = $_REQUEST['sort'];
      }

      if($_SESSION['sort_order'] === 'price-asc') {
        $sort = 'price-asc';
      } elseif($_SESSION['sort_order'] === 'price-desc') {
        $sort = 'price-desc';
      } else {
        // default to popular
        $sort = 'popular';
      }

      // save sort order to session
      // $_SESSSION['sort_order'] = $sort;

    ?>

    <!-- Filter sidebar -->

    <?php include_once '../../components/filter-sidebar.php'?>
    
    <!-- main content column -->
    <div class="main-content filter-bar-clear">
      
      <!-- Product search results -->
      <div class="content-block mobile-full-width">

      <div class="sort-wrapper">
        <div>Sort by: </div>
        
        <div class="sort-options-wrapper">
          <span
            class="sort-option text-button <?=($sort === 'popular') ? 'selected' : ''?>"
            data-sort="popular"
            tabindex="0"
          >popular</span>
          <span
            class="sort-option text-button <?=($sort === 'price-asc') ? 'selected' : ''?>"
            data-sort="price-asc"
            tabindex="0"
          >price: low to high</span>
          <span
            class="sort-option text-button <?=($sort === 'price-desc') ? 'selected' : ''?>"
            data-sort="price-desc"
            tabindex="0"
          >price: high to low</span>
        </div>
      </div>

      <?php

        // get products
        $products = $db->queryAndFetch('
          SELECT
            products.prod_id AS prod_id,
            products.prod_name,
            thumb_url,
            brand,
            prim_color,
            sec_color,
            price,
            gender,
            colors.num_colors,
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
          LEFT JOIN (
            SELECT prod_name, count(prod_name) AS num_colors
            FROM products
            GROUP BY prod_name
          ) AS colors ON products.prod_name = colors.prod_name
          ' . getProductSqlParams()
        );
        
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
            <a href="/pages/product-page/product-page.php?id=' . $prod_id . '" class="product-card">'
              . getProductCardBadge($products[$i]) . '
              <div class="product-card-image product-image-container loading">
                <img
                  src="'.$thumb_url.'"
                  alt="'.$brand.' '.$prod_name.' '.$prim_color.' '.$sec_color.'"
                  loading="lazy"
                >
              </div>

              <div class="product-info">
                <div class="brand">' . strtoupper($brand) . '</div>
                <div class="product-name">' . strtoupper($prod_name) . '</div>
                ' . getProductColorsCount($products[$i]) . '
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

<?php
  // pagination
  include_once '../../components/pagination.php';
?>
    
    </div>
  </div>


</main>

<!----------- 
    FOOTER    
------------->
<?php include '../../components/footer.php';?>

<?php
  $db = null;
?>

</div>
</body>
</html>