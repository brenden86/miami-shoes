<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Miami Shoes</title>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/main.css">
    <script src="./js/modules/slider.js" defer></script>
    <script src="./js/modules/carousel-scroll.js" defer></script>
    <script src="./js/modules/feature-blocks.js" defer></script>
    <script src="./js/modules/adaptive-font-size.js" defer></script>
    <script src="./js/modules/header-nav-toggle.js" defer></script>
    <!-- functions for populating product info -->

  </head> 
  <body>
    <div id="root">
      
<!----------- 
    HEADER    
------------->
<?php include('header.php');?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">
    
    <div class="main-content">

    <div class="page-not-found-container">
      <h1>Oops!</h1>
      <p>We didn't find the page you were looking for.</p>
      <span>
        <?php
          // FIX ME
          if(preg_match('/localhost/', $_SERVER['HTTP_REFERER'])) {
            echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Back</a> | ';
          }
        ?>
        <a href="/">Home</a>
      </span>
    </div>
    
    </div>

  </div>
</main>



<!----------- 
    FOOTER    
------------->
<?php include('footer.php');?>

</div>
</body>
</html>