<header class="">
  
  <div class="header-wrapper-main">
  <!-- header left section -->

    <div class="header-section left">
      <a href="/">
        <img src="/images/logo-placeholder.jpg" class="logo-image" alt="logo" />
      </a>
    </div>
    
    <!-- header center section -->
    <div class="header-section center">
      <!--nav links-->
      <nav class="header-navigation">
        <ul class="nav-items nolist">
          <li>
            <a href="/pages/product-search/product-search.php?mens=true" class="nav-link">Mens</a>
          </li>
          <li>
            <a href="/pages/product-search/product-search.php?womens=true" class="nav-link">Womens</a>
          </li>
          <li>
            <a href="/pages/product-search/product-search.php" id="brands-header" class="nav-link">Brands</a>
            <div class="header-mega-menu">
              <div class="header-mega-menu-wrapper">
                <div class="header-brands-wrapper">
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-adidas=adidas">
                    <img src="/images/logos/Adidas_Logo.png" alt="adidas">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-nike=nike">
                    <img src="/images/logos/Nike-Logo.png" alt="nike">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-vans=vans">
                    <img src="/images/logos/vans logo.png" alt="vans">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-converse=converse">
                    <img src="/images/logos/converse-logo.png" alt="converse">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-dockers=dockers">
                    <img src="/images/logos/dockers.png" alt="dockers">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-heydude=heydude">
                    <img src="/images/logos/heydude.png" alt="heydude">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-newbalance=new+balance">
                    <img src="/images/logos/new-balance.png" alt="new balance">
                  </a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
    
    <!--header right section-->
    <div class="header-section right">
      <div class="header-section-wrapper">
        <a href="/pages/my-cart/my-cart.php" id="header-cart-link" class="icon-link">
          <i class="bi-cart"></i>
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

      <div class="mobile-nav-toggle">
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
				<img src="/images/logo-placeholder.jpg" class="logo-image" alt="logo" />
			</a>
		
		</div>

		<div class="header-section right">

			<a href="/pages/my-cart/my-cart.php" id="header-cart-link test" class="icon-link">
        <i class="bi-cart"></i>
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
			<nav class="mobile-nav">
				<ul class="nolist nav-items">
					<li><a href="/pages/product-search/product-search.php?mens=true" class="nav-link">Mens</a></li>
					<li><a href="/pages/product-search/product-search.php?womens=true" class="nav-link">Womens</a></li>
					<li>
            <span id="brands-header-mobile" class="nav-link">Brands<i class="bi-chevron-down"></i></span>
            

            <div class="header-mega-menu mobile">
              <div class="header-mega-menu-wrapper">
                <div class="header-brands-wrapper">
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-adidas=adidas">
                    <img src="/images/logos/Adidas_Logo.png" alt="adidas">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-nike=nike">
                    <img src="/images/logos/Nike-Logo.png" alt="nike">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-vans=vans">
                    <img src="/images/logos/vans logo.png" alt="vans">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-converse=converse">
                    <img src="/images/logos/converse-logo.png" alt="converse">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-dockers=dockers">
                    <img src="/images/logos/dockers.png" alt="dockers">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-heydude=heydude">
                    <img src="/images/logos/heydude.png" alt="heydude">
                  </a>
                  <a class="brand-card" href="/pages/product-search/product-search.php?brand-filter-newbalance=new+balance">
                    <img src="/images/logos/new-balance.png" alt="new balance">
                  </a>
                </div>
              </div>
            </div>

          </li>
				</ul>
			</nav>
		</div>
		

	</div>
  
</header>