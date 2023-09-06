<?php
  session_start();
?>

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
  <script src="/client/js/modules/show-additional-fields.js" defer ></script>
  <script src="/client/js/modules/checkout-validation.js" defer ></script>
</head>
<body>
  <div id="root">
    
<?php include_once __DIR__ . '/../database/dbconnect.php' ?>
<?php include_once __DIR__ . '/../php-scripts/get-product-info.php' ?>
<?php include_once __DIR__ . '/../php-scripts/get-cart-info.php' ?>

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
        
        <div class="checkout-container card">
          <div class="checkout-wrapper">

            
            
            <!-- checkout forms -->
            <?php

            // ****** DEBUG - CLEAR SESSION DATA *******
            // $_SESSION['checkout_info'] = array();
            // $_SESSION['checkout_info']['current_step'] = 1;
            
            // initialize checkout info array and checkout step if not already present
            if(!isset($_SESSION['checkout_info'])) {
              $_SESSION['checkout_info'] = array();
              $_SESSION['checkout_info']['current_step'] = 1;
            }

            // reset checkout step if coming from a different page
            if(!preg_match('/checkout/', $_SERVER['HTTP_REFERER'])) {
              $_SESSION['checkout_info']['current_step'] = 1;
            }

            // extract checkout info from session
            if(isset($_SESSION['checkout_info'])) {
              extract($_SESSION['checkout_info']);
            }

            // go to previous checkout page if requested
            if($_GET['prev_step'] === '1' && $_SESSION['checkout_info']['current_step'] > 1) {
              $_SESSION['checkout_info']['current_step'] -= 1;
              // this is to change the url so the query params are not included
              // in the served file, to prevent going back on a refresh
              header('location: /client/checkout.php');
              exit;
            }

            include_once __DIR__ . '/checkout-progress.php';

            // display checkout validation error message
            if(isset($_SESSION['checkout_error'])) {
              echo '
              <h1>' . $_SESSION['checkout_error'] . '</h1>
              ';
              // clear checkout error message after displaying
              unset($_SESSION['checkout_error']);
            }

            if($_SESSION['checkout_info']['current_step'] === 1) {
              include_once __DIR__ . '/checkout-basic-info.php';
            } elseif ($_SESSION['checkout_info']['current_step'] === 2) {
              include_once __DIR__ . '/checkout-shipping-payment.php';
            } elseif ($_SESSION['checkout_info']['current_step'] === 3) {
              include_once __DIR__ . '/checkout-review.php';
            } else {
              include_once __DIR__ . '/checkout-basic-info.php';
            }
            ?>


          </form>
          
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
        <div class="summary-item-value"><?=getCartSubtotal()?></div>
      </div>
      
      <div class="order-summary-item-wrapper">
        <div>Shipping
          <span><?= ucwords($_SESSION['checkout_info']['shipping_type']) ?? '';?></span>
        </div>
        <div class="summary-item-value">
          <?php
            if($_SESSION['checkout_info'])
          ?>
        </div>
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