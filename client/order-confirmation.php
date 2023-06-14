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
      <a href="">Mens</a>
      <a href="">Womens</a>
      <a href="">Brands</a>
      <a href="">Sale</a>
    </nav>
    
    <form id="header-search" class="input-wrapper inline">
      <input type="text" placeholder="Search"></input>
      <button type="submit">
        <i class="bi-search"></i>
      </button>
    </form>
    
  </div>
  
  <!--header right section-->
  <div class="header-section right">
    <div class="header-section-wrapper">
      <a href="/cart" class="icon-link">
        <i class="bi-cart"></i>
        <span>Cart (2)</span>
      </a>
    </div>
  </div>
  
</header>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">

    <!-- main content column -->
    <div class="main-content narrow">


      <!-- checkout progress bar -->
      <div class="content-block">
        <div class="checkout-progress">
          <!-- progress bar -->
          <div class="checkout-progress-bar">
            <div class="progress-segment complete"></div>
            <div class="progress-segment complete"></div>
          </div>
          <!-- checkout step icons -->
          <div class="progress-steps-wrapper">
            <div id="progress-basic-info" class="checkout-step complete">
              <div class="checkout-step-icon">
                <i class="bi-check"></i>
              </div>
              <h1>Basic Info</h1>
            </div>
            <div id="progress-shipping-payment" class="checkout-step complete">
              <div class="checkout-step-icon">
                <i class="bi-check"></i>
              </div>
              <h1>Shipping & Payment</h1>
            </div>
            <div id="progress-review" class="checkout-step complete">
              <div class="checkout-step-icon">
                <i class="bi-check"></i>
              </div>
              <h1>Review</h1>
            </div>
          </div>
        </div>
      </div>

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
                  <div class="detail value">Brenden Koenigsman</div>
                  <div class="detail after">123 S Main St.<br>Salina, KS 67401</div>
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
  <footer class="">
    
    <div class="footer-main">
      
      <div class="footer-wrapper">
        <!-- social bar -->
        <div class="social-bar">
          
          <h3>Connect with us!</h3>
          <div class="social-icons">
            <a href="www.instagram.com" class="icon-link light">
              <i class="bi-instagram"></i>
            </a>
            <a href="www.facebook.com" class="icon-link light">
              <i class="bi-facebook"></i>
            </a>
          <a href="www.twitter.com" class="icon-link light">
            <i class="bi-twitter"></i>
          </a>
          <a href="www.pinterest.com" class="icon-link light">
            <i class="bi-pinterest"></i>
          </a>
        </div>
        
      </div>
      
      <!-- footer links -->
      <div class="footer-links">
        
        <!-- footer column 1 -->
        <div class="footer-column">
          <h3>Customer Service</h3>
          <a href="tel:1-800-555-5555">
            <i class="bi-telephone"></i>
            1-800-555-5555
          </a>
          <a href="mailto:support@domain.com">
            <i class="bi-envelope"></i>
            support@domain.com
          </a>
        </div>
        
        <!-- footer column 2 -->
        <div class="footer-column">
          <h3>Help</h3>
          <a href="/faq">FAQ</a>
          <a href="/returns">Return Policy</a>
          <a href="/gift-cars">Gift Cards</a>
          <a href="/unsubscribe">Email Unsubscribe</a>
        </div>
        
        <!-- footer column 3 -->
        <div class="footer-column">
          <h3>Be the first to know</h3>
          <p>Sign up to get notified of new products, deals, and special offers!</p>
          <div class="input-wrapper inline">
            <input id="footer-email-input" type="text" placeholder="enter email">
            <button class="btn secondary">Sign up</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <!-- secondary footer -->
  <div class="footer-secondary">
    
    <div class="footer-wrapper">
      
      <a href="/" class="footer-logo">
        <img src="images/logo-placeholder.jpg" class="logo-image" alt="logo" />
      </a>
      
      <div class="copyright">&copy; 2023 Miami Shoes, LLC</div>
      
      <div class="site-links">
        <a href="/sitemap">Site Map</a>
        <a href="/privacy">Privacy Policy</a>
        <a href="/cookie-settings">Cookie Settings</a>
      </div>
      
    </div>
    
  </div>
  
</footer>

</div>
</body>
</html>