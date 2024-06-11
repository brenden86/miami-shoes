<?php session_start();
  
  include_once '../../../database/dbconnect.php';
  include_once '../../../php-modules/get-product-info.php';
  include_once '../../../php-modules/get-cart-info.php';
  
  // ****** DEBUG - CLEAR SESSION DATA *******
  // $_SESSION['checkout_info'] = array();
  // $_SESSION['checkout_info']['current_step'] = 1;
  
  // initialize checkout info array and checkout step if not already present
  if(!isset($_SESSION['checkout_info'])) {
    $_SESSION['checkout_info'] = array();
    $_SESSION['checkout_info']['current_step'] = 1;
  }

  if(!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = array();
  }

  // store cart contents to session from cookie
  $cart_items = getCartItemsFromCookie();

  // redirect to cart page if no items in cart
  if(!$cart_items) {
    header('location: /cart');
    exit;
  }

  // remove item from cart items if out of stock
  foreach($cart_items as $item_index => $item) {
    if($item['qty'] < 1) {
      unset($cart_items[$item_index]);
    }
  }

  // store cart items info in session
  $_SESSION['cart_items'] = $cart_items;

  // reset checkout step if coming to checkout from a different page
  if(!preg_match('/checkout/', $_SERVER['HTTP_REFERER'])) {
    $_SESSION['checkout_info']['current_step'] = 1;
  }

  // extract checkout info from session
  if(isset($_SESSION['checkout_info'])) {
    extract($_SESSION['checkout_info']);
  }

  // go to previous checkout step if indicated in URI
  if($_GET['prev_step'] === '1' && $_SESSION['checkout_info']['current_step'] > 1) {
    $_SESSION['checkout_info']['current_step'] -= 1;
    // this is to change the url so the query params are not included
    // in the served file, to prevent going back again on a refresh
    header('location: /checkout');
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout | Miami Shoes</title>
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" as="style">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/styles/main.css">
  <script src="/pages/checkout/app.js" type="module" defer ></script>
  <script src="/js/accessibility.js" type="module" defer ></script>
</head>
<body>
  <div id="root">
    

 <!-- header  -->
<?php include '../../components/header.php';?>

<!-- main content -->
<main>
  <div class="main-content-wrapper">

    <!-- main content column -->
    <section class="main-content narrow">

      <div class="content-block mobile-full-width">
        
        <div class="checkout-container card">
          <div class="checkout-wrapper">

            <!-- checkout forms -->
            <?php

            // checkout progress bar
            include_once '../../components/checkout-progress.php';

            // display checkout validation error message here, if present
            if(isset($_SESSION['checkout_error'])) {
              echo '
              <div class="alert error">
                <div class="alert-wrapper">
                  <div class="alert-icon">
                    <i class="bi-exclamation-circle" role="presentation"></i>
                  </div>
                  <div class="alert-message">'.$_SESSION['checkout_error'].'</div>
                </div>
              </div>
              ';
              // clear checkout error message after displaying once
              unset($_SESSION['checkout_error']);
            }

            // display order error message (review page only)
            if(isset($_SESSION['order_error'])) {
              echo '
              <div class="alert error">
                <div class="alert-wrapper">
                  <div class="alert-icon">
                    <i class="bi-exclamation-circle" role="presentation"></i>
                  </div>
                  <div class="alert-message">'.$_SESSION['order_error'].'</div>
                </div>
              </div>
              ';
              // clear order error message after displaying
              unset($_SESSION['order_error']);
            }

            // show correct form fields based on checkout step
            if($current_step === 1) {
              include_once './checkout-basic-info.php';
            } elseif ($current_step === 2) {
              include_once './checkout-shipping-payment.php';
            } elseif ($current_step === 3) {
              include_once './checkout-review.php';
            } else {
              include_once './checkout-basic-info.php';
            }
            ?>


          </form>
          
        </div>
      </div>
      
    </section>
    
  
  <!-- order summary sidebar -->
  <?php

    // calculate subtotal, shipping cost, and taxes
    $_SESSION['checkout_info']['cart_subtotal'] = getCartSubtotal();

    // get correct shipping cost based on shipping type selected
    if(isset($_SESSION['checkout_info']['shipping_type'])) {
      $_SESSION['checkout_info']['shipping_cost'] = getShippingCost($_SESSION['checkout_info']['shipping_type']);
    }

    // sales tax rate & amount
    if(!empty($_SESSION['checkout_info']['shipping_state'])) {
      $_SESSION['checkout_info']['sales_tax_rate'] = getTaxRate($_SESSION['checkout_info']['shipping_state']);
      $_SESSION['checkout_info']['sales_tax'] = round($_SESSION['checkout_info']['sales_tax_rate'] * $_SESSION['checkout_info']['cart_subtotal'], 2);
    }
  ?>

  <aside class="order-summary-container">
    
    <div class="order-summary-wrapper">

      <h1>Order Summary</h1>
      <div class="order-summary-toggle icon-link" role="button" tabindex="0" aria-expanded="false" aria-controls="order-summary-details">
        <i class="bi-chevron-up" role="presentation"></i>
      </div>
      
      <div class="order-summary-items" id="order-summary-details">
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

      </div>
      
      <div class="order-summary-item-wrapper total">
        <div>Total</div>
        <div class="summary-item-value">

          <?='$' . 
          number_format(
            array_sum([
              $_SESSION['checkout_info']['cart_subtotal'],
              $_SESSION['checkout_info']['shipping_cost'],
              $_SESSION['checkout_info']['sales_tax']
            ]), 2);

          ?>
        </div>
      </div>
        
    </div>
      
      
  </aside>
    
  </div>
</main>

<!-- footer -->
<?php include '../../components/footer.php';?>

</div>
</body>
</html>