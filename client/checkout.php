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
</head>
<body>
  <div id="root">
    
<?php include_once __DIR__ . '/../database/dbconnect.php' ?>
<?php include_once __DIR__ . '/../php-scripts/get-cart-subtotal.php' ?>

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

            $_SESSION['checkout-info']['current-step'] = 1;
            include_once __DIR__ . '/checkout-progress.php';

            
            if($_SESSION['checkout-info']['current-step'] === 1) {
              include_once __DIR__ . '/checkout-basic-info.php';
            } elseif ($_SESSION['checkout-info']['current-step'] === 2) {
              include_once __DIR__ . '/checkout-shipping-payment.php';
            } elseif ($_SESSION['checkout-info']['current-step'] === 3) {
              include_once __DIR__ . '/checkout-review.php';
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
          <span>Standard</span>
        </div>
        <div class="summary-item-value">FREE</div>
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