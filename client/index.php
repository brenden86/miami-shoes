<?php
  include_once __DIR__ . '/../php-scripts/get-product-info.php';
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
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/main.css">
    <script src="./js/accessibility.js"></script>
    <script type="module" src="./js/app.js" defer></script>
  </head> 
  <body>
    <div id="root">
      
<!----------- 
    HEADER    
------------->
<?php include './components/header.php';?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">
    
    <div class="main-content">

    <!-- Slider -->
    <div class="content-block mobile-full-width">
      <div class="slider-container">

        <div class="slider-images">
          <div class="image-wrapper">
            <div class="slider-image" style="background-image: url(/images/slider/lebron.jpg)" title="Slider Graphic 1"></div>
            <div class="slider-image" style="background-image: url(/images/slider/boots.jpg)" title="Slider Graphic 2"></div>
            <div class="slider-image" style="background-image: url(/images/slider/converse.jpg)" title="Slider Graphic 3"></div>
            <div class="slider-image" style="background-image: url(/images/slider/running.jpg)" title="Slider Graphic 4"></div>
            <div class="slider-image" style="background-image: url(/images/slider/skateboard.webp)" title="Slider Graphic 5"></div>
          </div>
        </div>

        <div id="slider-prev" class="slider-control prev icon-link">
          <i class="bi-caret-left-fill"></i>
        </div>

        <div id="slider-next" class="slider-control next icon-link">
          <i class="bi-caret-right-fill"></i>
        </div>

      </div>
    </div>

    <!-- featured products -->
    <div class="content-block">

      <h1><span><i class="bi-fire"></i>Hot</span> Right Now</h1>

      
      <?php 
        // popular products carousel
        include './components/product-carousel_popular.php';
      ?>      
      

    </div>

    <!-- Categories -->
    <div class="content-block">

    <?php
      // category cards
      include './components/category-cards.php';
    ?>

    </div>

    <!---------BRANDS--------->

    <div class="content-block">
      <h1><span>Our</span> Brands</h1>

      <?php
        // brand squares
        include './components/brand-squares.php';
      ?>

    </div>

    <div class="content-block">

      <?php
        // feature blocks
        include './components/feature-blocks.php';
      ?>

    </div>
    
    </div>

  </div>
</main>


<!----------- 
    FOOTER    
------------->
<?php include './components/footer.php';?>

</div>
</body>
</html>

<?php
  $db = null;
?>