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
  <script src="/client/js/modules/cookie-functions.js" defer></script>
  <script src="/client/js/modules/cart-functions.js" defer></script>
</head>
<body>
  <div id="root">
    
<?php include_once __DIR__ . '/../database/dbconnect.php' ?>
<?php include_once __DIR__ . '/../php-scripts/get-product-info.php' ?>
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
    <div class="main-content narrow">

      <!-- cart items -->
      <div class="content-block">
        
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
              <div class="form-navigation-buttons">
                <a href="/client/product-search.php" class="text-button">Continue Shopping</a>
                <a href="/client/checkout.php" class="button next">
                  Checkout
                  <i class="bi-caret-right-fill"></i>
                </a>
              </div>
            </div>

            <!-- cart contents -->
            <div class="cart-contents">

            <?php include_once __DIR__ . '/../php-scripts/get-cart-contents.php'?>

            <!--
              <div class="cart-item">

                <div class="item-image">
                  <img src="./images/product-photos/adidas-running/40560_left_feed1000.jpg" alt="">
                </div>

                <div class="item-details-wrapper">

                  <div class="item-details">
                    <div class="item-name">Men's AirMax 2.0 Running Shoe</div>
                    <div class="item-property">
                      Color: <span>Slate/Deep Blue</span>
                    </div>
                    <div class="item-property">
                      Size: <span>10.5</span>
                    </div>
                  </div>

                  <div class="item-details right">
                    <div class="price">$59.99</div>
                    <div class="remove-item icon-link">
                      <i class="bi-trash"></i>
                    </div>
                  </div>
                  
                </div>

              </div>
            -->
            </div>

            <div id="clear-cart-button" class="text-button">
              <i class="bi-cart-x"></i>Clear cart
            </div>

          </div>
        </div>

      </div>
      
    
    </div>

    <!-- order summary sidebar -->
    <div class="order-summary-container">

      <div class="order-summary-wrapper">
        <h1>Order Summary</h1>

        <div class="order-summary-item-wrapper">
          <div>Subtotal</div>
          <div class="summary-item-value">$289.97</div>
        </div>

        <div class="order-summary-item-wrapper">
          <div>Shipping</div>
          <div class="summary-item-value">—</div>
        </div>

        <div class="order-summary-item-wrapper">
          <div>Estimated Tax</div>
          <div class="summary-item-value">—</div>
        </div>

        <div class="order-summary-item-wrapper total">
          <div>Total</div>
          <div class="summary-item-value">—</div>
        </div>

      </div>

    </div>

  </div>
</main>

<!----------- 
    FOOTER    
------------->
<?php include('./footer.php');?>

</div>
</body>
</html>