<?php
  session_start();
  
  include_once __DIR__ . '/../database/dbconnect.php';
  include_once __DIR__ . '/../php-scripts/get-product-info.php';
  include_once __DIR__ . '/../php-scripts/get-cart-info.php';
  
  // ****** DEBUG - CLEAR SESSION DATA *******
  // $_SESSION['checkout_info'] = array();
  // $_SESSION['checkout_info']['current_step'] = 1;
  
  // initialize checkout info array and checkout step if not already present
  if(!isset($_SESSION['checkout_info'])) {
    $_SESSION['checkout_info'] = array();
    $_SESSION['checkout_info']['current_step'] = 1;
  }

  // store cart contents to session from cookie
  $_SESSION['cart_items'] = getCartItems();

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
    header('location: /checkout.php');
    exit;
  }
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
  <script src="/js/modules/show-additional-fields.js" defer ></script>
  <script src="/js/modules/checkout-validation.js" defer ></script>
</head>
<body>
  <div id="root">
    

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

            include_once __DIR__ . '/checkout-progress.php';


            // display checkout validation error message
            if(isset($_SESSION['checkout_error'])) {
              echo '
              <div class="alert error">
                <div class="alert-wrapper">
                  <div class="alert-icon">
                    <i class="bi-exclamation-circle"></i>
                  </div>
                  <div class="alert-message">'.$_SESSION['checkout_error'].'</div>
                </div>
              </div>
              ';
              // clear checkout error message after displaying
              unset($_SESSION['checkout_error']);
            }

            // display order error message (review page only)
            if(isset($_SESSION['order_error'])) {
              echo '
              <div class="alert error">
                <div class="alert-wrapper">
                  <div class="alert-icon">
                    <i class="bi-exclamation-circle"></i>
                  </div>
                  <div class="alert-message">'.$_SESSION['order_error'].'</div>
                </div>
              </div>
              ';
              // clear order error message after diaplaying
              unset($_SESSION['order_error']);
            }


            // calculate subtotal, shipping cost, and taxes

            $_SESSION['checkout_info']['cart_subtotal'] = getCartSubtotal();

            if(isset($_SESSION['checkout_info']['shipping_type'])) {
              $_SESSION['checkout_info']['shipping_cost'] = getShippingCost($_SESSION['checkout_info']['shipping_type']);
            }

            // sales tax rate & amount
            if(!empty($_SESSION['checkout_info']['shipping_state'])) {
              $_SESSION['checkout_info']['sales_tax_rate'] = getTaxRate($_SESSION['checkout_info']['shipping_state']);
              $_SESSION['checkout_info']['sales_tax'] = number_format(round($_SESSION['checkout_info']['sales_tax_rate'] * $_SESSION['checkout_info']['cart_subtotal'], 2), 2, '.');
            }


            // show correct form fields
            if($current_step === 1) {
              include_once __DIR__ . '/checkout-basic-info.php';
            } elseif ($current_step === 2) {
              include_once __DIR__ . '/checkout-shipping-payment.php';
            } elseif ($current_step === 3) {
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
        <div class="summary-item-value">
          <?=isset($_SESSION['checkout_info']['cart_subtotal']) ? '$'.$_SESSION['checkout_info']['cart_subtotal'] : '';?>
        </div>
      </div>
      
      <div class="order-summary-item-wrapper">
        <div>Shipping
          <span><?= ucwords($_SESSION['checkout_info']['shipping_type']) ?? '';?></span>
        </div>
        <div class="summary-item-value">
          <?=isset($_SESSION['checkout_info']['shipping_cost']) ? '$'.$_SESSION['checkout_info']['shipping_cost'] : '—';?>
        </div>
      </div>
      
      <div class="order-summary-item-wrapper">
        <div>Estimated Tax</div>
        <div class="summary-item-value">
          <?=isset($_SESSION['checkout_info']['sales_tax']) ? '$'.$_SESSION['checkout_info']['sales_tax'] : '—';?>
        </div>
      </div>
      
      <div class="order-summary-item-wrapper total">
        <div>Total</div>
        <div class="summary-item-value">
          <?=
            isset(
              $_SESSION['checkout_info']['cart_subtotal'],
              $_SESSION['checkout_info']['shipping_cost'],
              $_SESSION['checkout_info']['sales_tax']
              ) ? '$' . array_sum([
                $_SESSION['checkout_info']['cart_subtotal'],
                $_SESSION['checkout_info']['shipping_cost'],
                $_SESSION['checkout_info']['sales_tax']
              ]) : '—';

          ?>
        </div>
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