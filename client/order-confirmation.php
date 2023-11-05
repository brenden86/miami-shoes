<?php
  session_start();

  // if trying to access this page before submitting an order, go back to checkout page
  if(!$_SESSION['order_submitted']) {
    header('location: /checkout.php');
    exit;
  }

  include_once __DIR__ . '/../php-scripts/get-product-info.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation | Miami Shoes</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="styles/main.css">
  <script src="./js/app.js" type="module" defer></script>
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
    <div class="main-content">

      <div class="content-block">

        <div class="order-confirmation-wrapper">

          <div class="confirmation-status">
            <i class="bi-clipboard-check"></i>
            <h1>Order Placed!</h1>
          </div>
          <div class="confirmation-message">
            Your items are on the way!
          </div>

        </div>

      </div>

      <?php
        // extract checkout_info from session
        extract($_SESSION['checkout_info']);
      ?>

      <div class="content-block mobile-full-width">

        <div class="order-information-container card">
          <div class="order-information-wrapper">

            <div id="order-number">Order #: <span><?=$order_id;?></span></div>

            <div class="order-details-wrapper">

              <div class="order-detail">
                <div class="detail-icon">
                  <i class="bi-person"></i>
                </div>
                <div class="detail-text">
                  <div class="detail before">Shipping to</div>
                  <div class="detail value"><?= strtoupper($shipping_first_name) . ' ' . strtoupper($shipping_last_name);?></div>
                  <div class="detail after">
                    <?= $shipping_street1; ?>
                    <br>
                    <?= $shipping_street2 ?? '';?>

                    <?= strtoupper($shipping_city)
                      . ', '
                      . strtoupper($shipping_state)
                      . ' '
                      . $shipping_zip;
                    ?>
                  </div>
                </div>
              </div>

              <div class="order-detail">
                <div class="detail-icon">
                  <i class="bi-calendar-check"></i>
                </div>
                <div class="detail-text">
                  <div class="detail before">Arriving by</div>
                  <?php $dlvr_timestamp = strtotime($dlvr_date); ?>
                  <div class="detail value"><?= date('l, M. j', $dlvr_timestamp) ?></div>
                </div>
              </div>

              <div class="order-detail">
                <div class="detail-icon">
                  <i class="bi-currency-dollar"></i>
                </div>
                <div class="detail-text">
                  <div class="detail before">Order total</div>
                  <div class="detail value"><?= array_sum([$cart_subtotal, $shipping_cost, $sales_tax]); ?></div>
                </div>
              </div>

            </div>

            
            <!-- ORDER ITEMS -->

            <div class="cart-contents">

              <div class="cart-header">
                <h1>Items in this order</h1>
              </div>
            
              <?php

                // DISPLAY ORDER ITEMS

                foreach($_SESSION['cart_items'] as $item) {

                  extract($item);

                  echo '
                  <div class="cart-item">

                    <div class="item-image">
                      <img src="' . $thumb_url . '" alt="' . $prod_name . '">
                    </div>

                    <div class="item-details-wrapper">

                      <div class="item-details">
                        <div class="item-name">' . buildProductTitle($item) . '</div>
                        <div class="item-property">
                          Color: <span>' . getProductColorNames($item) . '</span>
                        </div>
                        <div class="item-property">
                          Size: <span>' . $size . '</span>
                        </div>
                      </div>

                      <div class="item-details right">
                        <div class="price">$' . $price . '</div>
                      </div>
                      
                    </div>

                  </div>
                  
                  ';
                }
              ?>

              
              

            </div>

          </div>
        </div>

      </div>

      
    </div>
    
 
  </div>
</main>

<?php
  // clear previous order info from session
  // unset($_SESSION['checkout_info']);
  // unset($_SESSION['order_submitted']);
  // unset($_SESSION['cart_items']);
?>

<!----------- 
  FOOTER    
------------->
<?php include('./footer.php');?>

</div>
</body>
</html>