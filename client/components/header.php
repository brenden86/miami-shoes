<header class="">
  
  <div class="header-wrapper-main">
  <!-- header left section -->

    <div class="header-section left">
      <a href="/">
        <img src="/images/logo.png" class="logo-image" alt="logo" />
      </a>
    </div>
    
    <!-- header center section -->
    <div class="header-section center">
      <!--nav links-->
      <nav class="header-navigation" aria-label="main navigation">
        <ul class="nav-items nolist">
          <li>
            <a href="/products?mens=true" class="nav-link">Mens</a>
          </li>
          <li>
            <a href="/products?womens=true" class="nav-link">Womens</a>
          </li>
          <li>
            <a href="/products" id="brands-header" class="nav-link">Brands</a>
            <nav class="header-mega-menu" aria-label="brands navigation">
              <div class="header-mega-menu-wrapper">
                <div class="header-brands-wrapper">
                  <a class="brand-card" href="/products?brand-filter-adidas=adidas" aria-label="adidas">
                    <img src="/images/logos/Adidas_Logo.png" alt="adidas">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-nike=nike" aria-label="nike">
                    <img src="/images/logos/Nike-Logo.png" alt="nike">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-vans=vans" aria-label="vans">
                    <img src="/images/logos/vans logo.png" alt="vans">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-converse=converse" aria-label="converse">
                    <img src="/images/logos/converse-logo.png" alt="converse">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-dockers=dockers" aria-label="dockers">
                    <img src="/images/logos/dockers.png" alt="dockers">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-heydude=heydude" aria-label="heydude">
                    <img src="/images/logos/heydude.png" alt="heydude">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-newbalance=new+balance" aria-label="new balance">
                    <img src="/images/logos/new-balance.png" alt="new balance">
                  </a>
                </div>
              </div>
            </nav>
          </li>
        </ul>
      </nav>
    </div>
    
    <!--header right section-->
    <div class="header-section right">
      <div class="header-section-wrapper">
        <a href="/cart" id="header-cart-link" class="icon-link">
          <i class="bi-cart" role="presentation"></i>
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

  </div>

  <div class="header-wrapper-mobile">

		<div class="header-section left">

      <div class="mobile-nav-toggle" role="button" aria-expanded="false" tabindex="0">
        <div class="icon-link">
          <div class="nav-toggle-icon">
            <div class="icon-line"></div>
            <div class="icon-line"></div>
            <div class="icon-line"></div>
          </div>
        </div>
      </div>

    </div>

		<div class="header-section center">
			
			<a href="/">
				<img src="/images/logo.png" class="logo-image" alt="logo" />
			</a>
		
		</div>

		<div class="header-section right">

			<a href="/pages/my-cart/my-cart.php" id="header-cart-link test" class="icon-link">
        <i class="bi-cart" role="presentation"></i>
        <span id="header-cart-count">
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


    
		
		<div id="mobile-nav-container" class="">
			<nav class="mobile-nav" aria-label="mobile navigation">
				<ul class="nolist nav-items">
					<li><a href="/products?mens=true" class="nav-link">Mens</a></li>
					<li><a href="/products?womens=true" class="nav-link">Womens</a></li>
					<li>
            <span
              id="brands-header-mobile"
              class="nav-link"
              role="button"
              aria-expanded="false"
              tabindex="0"
            >Brands<i class="bi-chevron-down" role="presentation"></i></span>
            

            <nav class="header-mega-menu mobile">
              <div class="header-mega-menu-wrapper">
                <div class="header-brands-wrapper">
                  <a class="brand-card" href="/products?brand-filter-adidas=adidas">
                    <img src="/images/logos/Adidas_Logo.png" alt="adidas">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-nike=nike">
                    <img src="/images/logos/Nike-Logo.png" alt="nike">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-vans=vans">
                    <img src="/images/logos/vans logo.png" alt="vans">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-converse=converse">
                    <img src="/images/logos/converse-logo.png" alt="converse">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-dockers=dockers">
                    <img src="/images/logos/dockers.png" alt="dockers">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-heydude=heydude">
                    <img src="/images/logos/heydude.png" alt="heydude">
                  </a>
                  <a class="brand-card" href="/products?brand-filter-newbalance=new+balance">
                    <img src="/images/logos/new-balance.png" alt="new balance">
                  </a>
                </div>
              </div>
            </nav>

          </li>
				</ul>
			</nav>
		</div>
		

	</div>
  
</header>