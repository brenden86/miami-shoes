<!-- checkout form fields - REVIEW -->
<div id="checkout-form-review">

  <div id="checkout-review" class="checkout-fields">
  
  <!-- cart heading -->
  <div class="cart-header">
    <h1>Items in this order</h1>
    <div class="form-navigation-buttons">
      <a href="/pages/my-cart/my-cart.php" class="text-button">Back to cart</a>
    </div>
  </div>
  
  <!-- cart contents -->
  <div class="cart-contents">

    <?php

    foreach($_SESSION['cart_items'] as $item) {

      extract($item);    
    
      echo '
    
      <div class="cart-item">
    
        <div class="item-image">
          <img src="'.$thumb_url.'" alt="'.$prod_name.'">
        </div>
    
        <div class="item-details-wrapper">
    
          <div class="item-details">
            <div class="item-name">'.buildProductTitle($item).'</div>
            <div class="item-property">
              Color: <span>'.getProductColorNames($item).'</span>
            </div>
            <div class="item-property">
              Size: <span>'.$size.'</span>
            </div>
          </div>
    
          <div class="item-details right">
            <div class="price">'.$price.'</div>
          </div>
    
        </div>
    
      </div>

      ';
    }
  
    ?>
  
  </div>
  
  </div>

  <div class="form-navigation-buttons">
    <a href="/pages/checkout/checkout.php?prev_step=1" class="text-button">Back</a>
    <a href="/pages/checkout/order-submit.php" class="button next">
      Place Order
      <i class="bi-send" role="presentation"></i>
    </a>
  </div>
  
  </div>