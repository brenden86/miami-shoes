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
  
</head>
<body>
  <div id="root">
    
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
        
      <div class="product-card-container card">
        <div class="product-cards">

        <?php

          // build product query functions
          include_once __DIR__ . '/../php-scripts/get-sql-params.php';

          // handle IN STOCK param
          if(isset($_REQUEST['inStock'])) {
            $in_stock = 'HAVING COUNT(inventory.sku) > 0';
          } else {
            $in_stock = '';
          }

          // get products
          $products = queryAndFetch('
            SELECT
              prod_id,
              prod_name,
              thumb_url,
              brand,
              price,
              COUNT(inventory.sku) AS qty
            FROM products
            LEFT JOIN stock USING(prod_id)
            LEFT JOIN inventory USING(sku)
            ' . getProductSqlParams() . '
            GROUP BY prod_id
            ' . $in_stock . '
            ORDER BY prod_id ASC');
          // loop through products
          foreach($products as $product => $field) {

            // extract variables from array
            extract($field);

            echo '
            <div class="product-card-wrapper">
              <a href="/client/product-page.php?id=' . $prod_id . '" class="product-card">
                  <div class="badge">' . $prod_id . '</div>
                  <div class="product-card-image">
                    <img src="' . $thumb_url . '" alt="' . $brand . ' ' . $prod_name . '">
                  </div>
                  <div class="product-colors-wrapper">';

                  // get color variants for current product
                  $color_variants_query = $db->prepare('SELECT prim_color, sec_color FROM products WHERE prod_name = :prodname');
                  $color_variants_query->execute(['prodname' => $prod_name]);
                  $color_variants = $color_variants_query->fetchAll(PDO::FETCH_ASSOC);
                  
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
                    <div class="brand">' . strtoupper($field['brand']) . '</div>
                    <div class="product-name">' . strtoupper($field['prod_name']) . '</div>
                    <div class="price">$' . $field['price'] . '</div>
                  </div>
              </a>
            </div>
            '; // END ECHO

          // END foreach
          }
        ?>


        </div>
      </div>

    </div>

    <!-- Pagination -->

    <div class="content-block">
      <div class="pagination-container">
        <div class="pagination-wrapper">

          <div class="page-buttons">
            <button class="prev"><i class="bi-caret-left-fill"></i>prev</button>
            <button class="next">next<i class="bi-caret-right-fill"></i></button>
          </div>

          <div class="page-numbers">
            <a href="#" class="selected">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">4</a>
          </div>

        </div>
      </div>
    </div>

    
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