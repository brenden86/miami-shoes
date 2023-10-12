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
  <script src="./js/modules/product-image-gallery.js" defer></script>
  <script src="./js/modules/cart-functions.js" defer></script>
  <script src="./js/modules/cookie-functions.js" defer></script>
  <script src="./js/modules/popups.js" defer></script>
</head>
<body>
  <div id="root">
    
    <?php
  // INCLUDES
  include_once __DIR__ . '../../database/dbconnect.php';
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
    
    
    <!-- main content column -->
    <div class="main-content">
      <?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

// Get product info from DB
$product_query = $db->prepare('
  SELECT
    prod_id,
    prod_name,
    thumb_url,
    price,
    brand,
    gender,
    shoe_type,
    prim_color,
    sec_color,
    COUNT(inventory.sku) AS qty
  FROM products
  LEFT JOIN stock USING(prod_id)
  LEFT JOIN inventory USING(sku)
  WHERE prod_id = :id
  GROUP BY prod_id
');
$product_query->execute(['id' => $id]);
$product = $product_query->fetch(PDO::FETCH_ASSOC);

// Extract fields into variables
extract($product);

// Get product image URLs
$product_image_query = $db->prepare('SELECT * FROM prod_images WHERE prod_id = :id');
$product_image_query->execute(['id' => $id]);
$product_images = $product_image_query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="content-block">
  <div class="product-wrapper">
    
    <!-- left column -->
    <div class="product-column">
      
      <div class="selected-image">
        <img
        src="<?=$thumb_url?>"
        alt="<?=$prod_name?>"
        >
      </div>
      
      <div class="thumbnail-wrapper">
        <?php
          // populate product images
          foreach($product_images as $image => $path) {
            echo '
            <div class="thumbnail">
            <img src="' . $path['img_path'] . '" alt="' . $product['prod_name'] . '">
            </div>
            ';
          }
        ?>
            
            
        </div>
          
        </div>
        
        <!-- right column -->
        <div class="product-column">
          <div class="product-info-wrapper">
            
            <!-- breadcrumbs -->
            <div class="breadcrumbs">
              <?=buildBreadcrumbs($product)?>
            </div>
            <!-- product text -->
            <div class="info-group product-text">
              <div class="brand"><?=$product['brand']?></div>
              <h1 class="product-title">
                <?=buildProductTitle($product)?>
              </h1>
              <?=($qty < 1) ? '<div class="out-of-stock">Out of Stock</div>' : '' ?>
              <div class="price">$<?=$price?></div>
            </div>
            
            <!-- product colors -->
            <div class="info-group">
              <h2>Colors:</h2>
              <span><?=getProductColorNames($product)?></span>
              <div class="product-colors-wrapper">
                <?php 
                  $color_variants = $db->getColorVariants($prod_name, $gender);
                  $color_hex_array = $db->queryAndFetch('SELECT color_name, color_hex FROM prod_colors');

                  // create array of color hex values
                  foreach($color_hex_array as $color) {
                    $color_hex_values[$color['color_name']] = $color['color_hex'];
                  }
                  
                  // loop through variants, return color block HTML
                  foreach($color_variants as $variant) {
                    
                    // set selected class
                    if ($variant['prim_color'] === $product['prim_color'] && $variant['sec_color'] === $product['sec_color']) {
                      $selected = 'selected';
                    } else {
                      $selected = '';
                    }
                    
                    echo '
                    <a
                    href="/product-page.php?id=' . $variant['prod_id'] . '"
                    class="product-color '.$selected.'"
                    >
                    <div class="color-swatch primary" style="background: #'.$color_hex_values[$variant['prim_color']].'"></div>
                    <div class="color-swatch secondary" style="background: #'.$color_hex_values[$variant['sec_color']].'"></div>
                    </a>
                    ';
                  }
                ?>
              </div>
            </div>
            
            <!-- available sizes -->
            <div class="info-group">
              <h2>Size:</h2>
              <div class="sizes-wrapper">
                <?php 
                  $shoe_sizes = $db->getSizesInStock($prod_id);
                  
                  // loop through sizes array and display
                  foreach($shoe_sizes as $item) {

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
                    <div class="size-button ' . $disabled . '" data-size="'.$item['size'].'" data-sku="'.$item['sku'].'">'.$size_text.'</div>';
                  }
                ?>
              </div>
            </div> 
            
            <div id="add-to-cart" class="button <?=($qty < 1) ? 'disabled' : ''?>">add to cart</div>
            
            <!-- item details -->
            <div class="info-group">
              <h2>Item details:</h2>
              <ul>
                <?php
                  $product_details = $db->getProductDetails($prod_id);
                  // iterate & echo details
                  foreach($product_details as $detail) {
                    echo '<li>' . $detail['prod_detail'] . '</li>';
                  }
                ?>
              </ul>
            </div>
            
            
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
  
</div>
</main>

<script src="./js/modules/select-size.js" defer></script>
<!----------- 
FOOTER    
------------->
<?php include('./footer.php');?>

<?php
  // terminate DB connection
  $db = null;
?>

</div>
</body>
</html>