<?php session_start();
  
  // go back to first checkout screen if cart is updated
  if($_GET['update'] === '1') {
    $_SESSION['checkout_info']['current_step'] = 1;
    // remove query params from URL
    header('location: /MyCart.php');
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart | Miami Shoes</title>
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" as="style">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/styles/main.css">
  <script src="/pages/my-cart/app.js" type="module" defer></script>
  <script src="/js/accessibility.js" type="module" defer></script>
</head>
<body>
  <div id="root">
    
<?php include_once '../../../database/dbconnect.php' ?>
<?php include_once '../../../php-modules/get-product-info.php' ?>
<?php include_once '../../../php-modules/get-cart-info.php' ?>
<!----------- 
    HEADER    
------------->

<?php include '../../components/header.php';?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">



    <!-- main content column -->
    <div class="main-content">

      <!-- cart items -->
      <div class="content-block mobile-full-width">
        
        <div class="cart-container card">
          <div class="cart-wrapper">

            <!-- cart heading -->
            <div class="cart-header">
              <h1>Your Cart <span id="cart-count">
                <?php
                if(isset($_COOKIE['cart-items'])) {
                  $cart_cookie = json_decode($_COOKIE['cart-items']);
                  if($cart_cookie && count($cart_cookie) > 0) {
                    echo '(' . count($cart_cookie) . ')';
                  }
                }
                ?>
              </span>
              </h1>
              <?php
              if($cart_cookie && count($cart_cookie) > 0) {
                echo '
                  <div class="form-navigation-buttons">
                    <a href="/products" class="text-button">Continue Shopping</a>
                    <a href="/checkout" class="button next">
                      Checkout
                      <i class="bi-caret-right-fill"></i>
                    </a>
                  </div>
                ';
              }
              ?>
            </div>

            <!-- cart contents -->
            <div class="cart-contents">
            
            <!-- subtotal -->
            <?php
            if(
              isset($_COOKIE['cart-items']) &&
              count(json_decode($_COOKIE['cart-items'])) > 0
            ) {
              echo '
              <div class="cart-subtotal">
                <div class="heading inline">Subtotal: </div>
                <span class="price">$'.getCartSubtotal().'</span>
              </div>
              ';
            }
            ?>

            <?php
              if(isset($_COOKIE['cart-items']) && count(json_decode($_COOKIE['cart-items'])) > 0) {
                $show_cart_empty_message = 'false';
              } else {
                $show_cart_empty_message = 'true';
              }
            ?>

            <h2
              class="cart-empty-message <?= ($show_cart_empty_message=='true') ? 'show' : '' ?>"
            >Your cart is empty!</h2>

            <?php
              
              $cart_items = getCartItemsFromCookie();

              if(isset($cart_items)) {
    
              // loop through cart items & echo HTML
              foreach($cart_items as $key => $item) {
                
                extract($item);

                echo '
                
                <div class="cart-item" data-sku='.$sku.' data-index=' . $key . '>
    
                  <div class="item-image loading">
                    <img src="'.$thumb_url.'" alt="'.$prod_name.'">
                  </div>
    
                  <div class="item-details-wrapper">
    
                    <div class="item-details">
                      <div class="item-name">'.buildProductTitle($item).'</div>
                      <div class="item-property">
                        Color: <span>'.getProductColorNames($item).'</span>
                      </div>
                      <div class="item-property">
                        Size: <span>'.$size.'</span>
                      </div>
                    </div>
    
                    <div class="item-details right">
                      <div class="price">$'.number_format($price, 2).'</div>
                      <div class="remove-item icon-link" role="button" aria-label="remove item" tabindex="0">
                        <i class="bi-trash" role="presentation"></i>
                      </div>
                    </div>
                    
                  </div>

                </div>

                ';
   
              }

              }

              ?>
              </div>

            </div>
            
            <?php
              if($cart_cookie && count($cart_cookie) > 0) {
                echo '
                  <div id="clear-cart-button" class="text-button" role="button" tabindex="0">
                    <i class="bi-cart-x" role="presentation"></i>Clear cart
                  </div>
                ';
              }
            ?>

          </div>
        </div>

      </div>
      
    
    </div>

</main>

<!----------- 
    FOOTER    
------------->
<?php include '../../components/footer.php';?>

</div>
</body>
</html>