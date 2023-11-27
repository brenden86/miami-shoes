

<div class="product-card-container">

  <div class="carousel-control prev icon-link">
    <i class="bi-caret-left-fill"></i>
  </div>

  <div class="carousel-control next icon-link">
    <i class="bi-caret-right-fill"></i>
  </div>

  <div class="product-cards-wrapper">

    <div class="product-cards inline">
      
      <?php

        // get top 12 products by popularity (order qty)
        $products = $db->queryAndFetch('
        SELECT
          products.prod_id AS prod_id,
          products.prod_name,
          thumb_url,
          brand,
          price,
          gender,
          colors.num_colors,
          inventory.qty_in_stock AS qty_in_stock,
          order_items.qty_ordered AS qty_ordered,
          avail_date
        FROM products
        LEFT JOIN (
          SELECT prod_id, count(prod_id) AS qty_in_stock
          FROM inventory
          LEFT JOIN stock USING(sku)
          GROUP BY prod_id
        ) AS inventory ON products.prod_id = inventory.prod_id
        LEFT JOIN (
          SELECT prod_id, count(prod_id) AS qty_ordered
          FROM order_items
          LEFT JOIN stock USING(sku)
          GROUP BY prod_id
        ) AS order_items ON products.prod_id = order_items.prod_id
        LEFT JOIN (
          SELECT prod_name, count(prod_name) AS num_colors
          FROM products
          GROUP BY prod_name
        ) AS colors ON products.prod_name = colors.prod_name
        ORDER BY qty_ordered DESC
        LIMIT 12
        ');

        // loop through products
        foreach($products as $product => $field) {
        // output html
        echo '
        <div class="product-card-wrapper">
          <a href="/products/'.$field['prod_id'].'/'.slugify($field['brand'].'-'.$field['prod_name']).'" class="product-card">'
              . getProductCardBadge($field) . '
              <div class="product-card-image loading">
                <img
                  src="' . $field['thumb_url'] . '"
                  alt="' . $field['brand'] . ' ' . $field['prod_name'] . '">
              </div>

              <div class="product-info">
                <div class="brand">' . strtoupper($field['brand']) . '</div>
                <div class="product-name">' . strtoupper($field['prod_name']) . '</div>
                ' . getProductColorsCount($field) . '
                <div class="price">$' . $field['price'] . '</div>
              </div>
          </a>
        </div>
        '; // END ECHO

        // END foreach
        }

      ?>

    </div>

  </div>



</div>