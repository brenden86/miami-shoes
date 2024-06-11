<?php
  include_once __DIR__ . '/../php-modules/get-product-info.php';
  include_once __DIR__ . '/../database/dbconnect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Miami Shoes</title>
  <meta name="description" content="Shop the latest styles of mens and womens shoes. Fast and free shipping anywhere in the US.">
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" as="style">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./styles/main.css">
  <script src="./js/accessibility.js"></script>
  <script type="module" src="./js/app.js" defer></script>
</head>

<body>
<div id="root">
      
<!-- header -->
<?php include './components/header.php';?>

<!-- main content -->
<main>
  <div class="main-content-wrapper">
    
    <div class="main-content">

      <!-- slider -->
      <div class="content-block mobile-full-width">
        <?php include './components/slider.php'; ?>
      </div>

      <!-- featured products -->
      <div class="content-block">

        <h1><span><i class="bi-fire"></i>Hot</span> Right Now</h1>
        <!-- popular products carousel -->
        <?php include './components/product-carousel_popular.php';?>      
        
      </div>

      <!-- categories -->
      <div class="content-block">
        <?php include './components/category-cards.php';?>
      </div>

      <!-- brands -->

      <div class="content-block">
        <h1><span>Our</span> Brands</h1>
        <?php include './components/brand-squares.php';?>
      </div>

      <div class="content-block">
        <?php include './components/feature-blocks.php';?>
      </div>
      
    </div>

  </div>
</main>

<!-- footer -->
<?php include './components/footer.php';?>

</div>
</body>
</html>

<?php $db = null;?>