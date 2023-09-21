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

      <div class="content-block">

        <div class="order-information-container card">
          <div class="order-information-wrapper">

            <div id="order-number">Order #: <span>059-064985</span></div>

            <div class="order-details-wrapper">

              <div class="order-detail">
                <div class="detail-icon">
                  <i class="bi-person"></i>
                </div>
                <div class="detail-text">
                  <div class="detail before">Shipping to</div>
                  <div class="detail value"><?= strtoupper($_SESSION['checkout_info']['shipping_first_name']) . ' ' . strtoupper($_SESSION['checkout_info']['shipping_last_name']);?></div>
                  <div class="detail after">
                    <?= $_SESSION['checkout_info']['shipping_street1'] ?>
                    <br>
                    <?= isset($_SESSION['checkout_info']['shipping_street2'])
                      ? strtoupper($_SESSION['checkout_info']['shipping_street2']) . '<br>'
                      : '';
                    ?>
                    <?= strtoupper($_SESSION['checkout_info']['shipping_city'])
                      . ', '
                      . strtoupper($_SESSION['checkout_info']['shipping_state'])
                      . ' '
                      . $_SESSION['checkout_info']['shipping_zip'];
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
                  <div class="detail value">Thursday, Feb. 30</div>
                </div>
              </div>

              <div class="order-detail">
                <div class="detail-icon">
                  <i class="bi-currency-dollar"></i>
                </div>
                <div class="detail-text">
                  <div class="detail before">Order total</div>
                  <div class="detail value">315.34</div>
                </div>
              </div>

            </div>

            <!-- cart contents -->
            <div class="cart-contents">

              <div class="cart-header">
                <h1>Items in this order</h1>
              </div>

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
                  </div>
                  
                </div>

              </div>
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
                  </div>
                  
                </div>

              </div>
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
                  </div>
                  
                </div>

              </div>
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
                  </div>
                  
                </div>

              </div>

            </div>

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