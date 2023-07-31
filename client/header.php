<header>
  
  <!-- header left section -->
  <div class="header-section left">
    <a href="/client/">
      <img src="images/logo-placeholder.jpg" class="logo-image" alt="logo" />
    </a>
  </div>
  
  <!-- header center section -->
  <div class="header-section center">
    <!--nav links-->
    <nav class="header-navigation">
      <a href="/client/product-search.php?gender=1">Mens</a>
      <a href="/client/product-search.php?gender=2">Womens</a>
      <a href="/client/product-search.php">Brands</a>
      <a href="/client/product-search.php">Sale</a>
    </nav>
    
  </div>
  
  <!--header right section-->
  <div class="header-section right">
    <div class="header-section-wrapper">
      <a href="/client/my-cart.php" class="icon-link">
        <i class="bi-cart"></i>
        Cart 
        <?php
          // get cart items
          if(
            isset($_SESSION['cart-items']) &&
            count($_SESSION['cart-items']) > 0 
            ) {
            echo '('.count($_SESSION['cart-items']).')';
          }
        ?>
      </a>
    </div>
  </div>
  
</header>