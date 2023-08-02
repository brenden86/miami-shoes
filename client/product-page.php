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
$product_query = $db->prepare('SELECT * FROM products WHERE prod_id = :id');
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
              <div class="price">$<?=$price?></div>
            </div>
            
            <!-- product colors -->
            <div class="info-group">
              <h2>Colors:</h2>
              <span><?=getProductColorNames($product)?></span>
              <div class="product-colors-wrapper">
                <?=buildColorBlocks($product)?>
              </div>
            </div>
            
            <!-- available sizes -->
            <div class="info-group">
              <h2>Size:</h2>
              <div class="sizes-wrapper">
                <?=getSizes($product)?>
              </div>
            </div> 
            
            <div id="add-to-cart" class="button">add to cart</div>
            
            <!-- item details -->
            <div class="info-group">
              <h2>Item details:</h2>
              <ul>
                <?=getDetails($product)?>
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