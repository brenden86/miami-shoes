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
  <script src="./js/modules/select-sort.js" async></script>
  <script src="./js/modules/adaptive-font-size.js" defer></script>
  
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

      <div class="sort-wrapper">
        <div>Sort by: </div>
        <?php
          // get sort order from request
          // default to sort by popular
          if($_REQUEST['sort'] === 'price-asc') {
            $sort = 'price-asc';
          } elseif($_REQUEST['sort'] === 'price-desc') {
            $sort = 'price-desc';
          } else {
            $sort = 'popular';
          }
        ?>
        <div class="sort-options-wrapper">
          <span
            class="sort-option text-button <?=($sort === 'popular') ? 'selected' : ''?>"
            data-sort="popular"
          >popular</span>
          <span
            class="sort-option text-button <?=($sort === 'price-asc') ? 'selected' : ''?>"
            data-sort="price-asc"
          >price: low to high</span>
          <span
            class="sort-option text-button <?=($sort === 'price-desc') ? 'selected' : ''?>"
            data-sort="price-desc"
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
            <a href="/product-page.php?id=' . $prod_id . '" class="product-card">'
              . getProductCardBadge($products[$i]) . '
              <div class="product-card-image">
                <img src="' . $thumb_url . '" alt="' . $brand . ' ' . $prod_name . '">
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