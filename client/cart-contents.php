
<?php
  if(isset($_COOKIE['cart-items']) && count(json_decode($_COOKIE['cart-items'])) > 0) {
    $show_cart_empty_message = 'false';
  } else {
    $show_cart_empty_message = 'true';
  }
?>

<h2
  class="cart-empty-message <?= ($show_cart_empty_message=='true') ? 'show' : '' ?>"
  aria-hidden="<?=$show_cart_empty_message?>"
>Your cart is empty!</h2>

<?php

if(isset($_COOKIE['cart-items']) && count(json_decode($_COOKIE['cart-items'])) > 0) {

  $cart_items = json_decode($_COOKIE['cart-items']);

  foreach($cart_items as $item) {

    // query product data from DB by SKU

    $cart_item_query = $db->prepare('
    SELECT
      sku,
      thumb_url,
      prod_name,
      prod_id,
      price,
      prim_color,
      sec_color,
      size,
      gender
    FROM stock
    LEFT JOIN products USING(prod_id)
    WHERE sku = :sku
    ');
    $cart_item_query->execute(['sku' => $item]);
    $cart_item = $cart_item_query->fetch(PDO::FETCH_ASSOC);

  extract($cart_item);

  // output HTML

  echo '
  <div class="cart-item" data-sku='.$sku.'>

    <div class="item-image">
      <img src="'.$thumb_url.'" alt="'.$prod_name.'">
    </div>

    <div class="item-details-wrapper">

      <div class="item-details">
        <div class="item-name">'.buildProductTitle($cart_item).'</div>
        <div class="item-property">
          Color: <span>'.getProductColorNames($cart_item).'</span>
        </div>
        <div class="item-property">
          Size: <span>'.$size.'</span>
        </div>
      </div>

      <div class="item-details right">
        <div class="price">$'.$price.'</div>
        <div class="remove-item icon-link">
          <i class="bi-trash"></i>
        </div>
      </div>
      
    </div>

  </div>
  ';

  // END FOREACH
  }

}

?>