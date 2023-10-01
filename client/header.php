<header>
  
  <!-- header left section -->
  <div class="header-section left">
    <a href="/">
      <img src="images/logo-placeholder.jpg" class="logo-image" alt="logo" />
    </a>
  </div>
  
  <!-- header center section -->
  <div class="header-section center">
    <!--nav links-->
    <nav class="header-navigation">
      <a href="/product-search.php?gender=1">Mens</a>
      <a href="/product-search.php?gender=2">Womens</a>
      <a href="/product-search.php">Brands</a>
      <a href="/product-search.php">Sale</a>
    </nav>
    
  </div>
  
  <!--header right section-->
  <div class="header-section right">
    <div class="header-section-wrapper">
      <a href="/my-cart.php" id="header-cart-link" class="icon-link">
        <i class="bi-cart"></i>
        Cart<span id="header-cart-count">
        <?php
          // show number of cart items
          if(isset($_COOKIE['cart-items'])) {
            $cart_cookie = json_decode($_COOKIE['cart-items']);
            if($cart_cookie && count($cart_cookie) > 0) {
              echo '(' . count($cart_cookie) . ')';
            }
          }
        ?></span>
      </a>
    </div>
  </div>
  
</header>