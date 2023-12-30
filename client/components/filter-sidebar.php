
<aside class="sidebar-container">

  <div class="filter-sort-container">

    <div class="filter-sort-left">

      <div class="filter-sort-wrapper">
        <div class="filter-icon icon-link" tabindex="0">
          <i class="bi-funnel" role="presentation"></i>
        </div>
        <div class="sort-icon icon-link" tabindex="0">
          <i class="bi-arrow-down-up" role="presentation"></i>
        </div>
      </div>

      <div class="sort-wrapper">
        <div class="sort-selected-mobile">
          <?=
            ($sort === 'price-asc') ? 'Price: low to high' : 
            ($sort === 'price-desc' ? 'Price: high to low' : 'Popular');
          ?>
        </div>
        <div class="sort-options-wrapper">
          <span class="sort-option" data-sort="popular" role="button" tabindex="0">popular</span>
          <span class="sort-option" data-sort="price-asc" role="button" tabindex="0">price: low to high</span>
          <span class="sort-option" data-sort="price-desc" role="button" tabindex="0">price: high to low</span>
        </div>
      </div>

    </div>
    
    <div class="filter-sort-right">

      <div class="filter-submit-button text-button" role="button" tabindex="0">
        <i class="bi-arrow-clockwise" role="presentation"></i>
        apply filters
      </div>

    </div>
    
  </div>

  <form
    id="product-filters-form"
    action=""
    method="GET"
    class="filters-wrapper"
  >
    
    
    <!-- update search button; executes query based on filters selected -->
    
    
    <div class="filter-group">

      <div class="filter-group-name">Availability</div>
      <div class="filters">

        <div class="input-wrapper inline">
          <label for="filter-availability" class="checkbox-container" tabindex="0">
            <input
              id="filter-availability"
              type="checkbox"
              name="inStock"
              value=true
              tabindex="-1"
              <?=($_REQUEST['inStock']==='true') ? 'checked' : '';?>

            >
            <div class="checkbox">
              <i class="bi-check" role="presentation"></i>
            </div>
            In Stock
          </label>
        </div>
      </div>
    </div>
    
    <div class="filter-group">

      <!-- gender filter -->
      <div class="filter-group-name">Gender</div>
      <div class="filters">

        <div class="input-wrapper inline">
          <label for="filter-gender-mens" class="checkbox-container" tabindex="0">
            <input
              id="filter-gender-mens"
              type="checkbox"
              name="mens"
              value=true
              tabindex="-1"
              <?=($_REQUEST['mens']==='true') ? 'checked' : '';?>
            >
            <div class="checkbox">
              <i class="bi-check" role="presentation"></i>
            </div>
            Mens
          </label>
        </div>

        <div class="input-wrapper inline">
          <label for="filter-gender-womens" class="checkbox-container" tabindex="0">
            <input
              id="filter-gender-womens"
              type="checkbox"
              name="womens"
              value=true
              tabindex="-1"
              <?=($_REQUEST['womens']==='true') ? 'checked' : '';?>
            >
            <div class="checkbox">
              <i class="bi-check" role="presentation"></i>
            </div>
            Womens
          </label>
        </div>
      </div>
      
    </div>
    
    <!-- color filters -->
    <div class="filter-group">
      <div class="filter-group-name">Colors</div>
      <div class="filters">
        <div class="filter-colors-wrapper">
          
          <?php
            // get distinct filter colors
            $filter_colors = $db->queryAndFetch('SELECT DISTINCT filter_color, filter_hex FROM prod_colors');
            foreach($filter_colors as $color) {
              
              extract($color);
              
              // persist checks
              if($_REQUEST['filter-color-'.$filter_color]==='true') {
                $checked = 'checked';
              } else {
                $checked = '';
              }

              // give light filter colors a darker check so it is visible
              if($filter_color === 'white' || $filter_color === 'yellow') {
                $light_filter_class = 'light-color';
              } else {
                $light_filter_class = '';
              }

              echo '
              
              <div
                class="filter-color checkbox-container"
                style="background: #'.$color['filter_hex'].'"
              >
              <input id="'.$filter_color.'" type="checkbox" tabindex="-1" name="filter-color-'.$filter_color.'" value=true
              ' . $checked . '
              >
              <label for="'.$filter_color.'" class="checkbox '.$light_filter_class.'" tabindex="0">
                <i class="bi-check" role="presentation"></i>
              </label>
              </div>
              ';
            }
          
          
          ?>

          <!--  -->

          <div id="color-selected"></div>

        </div>
      </div>
    </div>
    
    <!-- PRICE FILTER -->

    <div class="filter-group">
      <div class="filter-group-name">Price</div>
      <div class="filters">
        <div class="input-wrapper inline mobile-inline small">
          <span>$</span>
          <label for="filter-price-min" class="sr-only">minimum price</label>
          <input id="filter-price-min" type="text" name="priceMin" placeholder="min." maxlength="8"
          value=<?=$_REQUEST['priceMin'] ?? '';?>
          >
          <span>to</span>
          <label for="filter-price-max" class="sr-only">maximum price</label>
          <input id="filter-price-max" type="text" name="priceMax" placeholder="max." maxlength="8"
          value=<?=$_REQUEST['priceMax'] ?? '';?>
          >
        </div>
      </div>
    </div>

    <div class="filter-group">

      <!-- shoe type filter -->

      <div class="filter-group-name">Shoe Type</div>
      <div class="filters">
        
      <?php

        // get distinct shoe types from products in stock
        $types = $db->queryAndFetch('SELECT DISTINCT shoe_type FROM stock LEFT JOIN products USING(prod_id) ORDER BY shoe_type DESC');

        
        foreach($types as $type) {

          // persist checked inputs
          ($_REQUEST['type-filter-'.$type['shoe_type']] === $type['shoe_type']) ? $checked = 'checked' : $checked = '';

          echo '
          <div class="input-wrapper inline shoe-type-input">
            <label for="filter-type-' . $type['shoe_type'] . '" class="checkbox-container" tabindex="0">
              <input
                id="filter-type-' . $type['shoe_type'] . '"
                type="checkbox"
                tabindex="-1"
                name="type-filter-' . $type['shoe_type'] . '"
                value="'.$type['shoe_type'].'" ' . 
                $checked . '
              >
              <div class="checkbox">
                <i class="bi-check" role="presentation"></i>
              </div>
              ' . ucwords($type['shoe_type']) . '
            </label>
          </div>
          ';
        }


      ?>
      </div>

      <div id="shoe-type-selected"></div>

    </div>

    <div class="filter-group">

      <!-- brand filter -->
      <div class="filter-group-name">Brands</div>
      <div class="filters">

      <?php
        // populate filters for brands that are being stocked

        // get distinct brands from stock table
        $brands = $db->queryAndFetch('SELECT DISTINCT brand FROM stock LEFT JOIN products USING(prod_id)');

        foreach($brands as $brand) {
          
          // remove spaces from brand names with multiple words (new balance)
          $no_space = preg_replace("/\s+/", "", $brand['brand']);

          // persist checked filters
          ($_REQUEST['brand-filter-'.$brand['brand']]===$brand['brand']) ? $checked = 'checked' : $checked = '';
          
          echo '
          <div class="input-wrapper inline brand-input">
            <label for="filter-brand-' . $no_space . '" class="checkbox-container" tabindex="0">
              <input
                id="filter-brand-' . $no_space . '"
                type="checkbox"
                tabindex="-1"
                name="brand-filter-' . $no_space . '"
                value="'.$brand['brand'].'" ' . 
                $checked . '
              >
              <div class="checkbox">
                <i class="bi-check" role="presentation"></i>
              </div>
              ' . ucwords($brand['brand']) . '
            </label>
          </div>
          ';
        }


      ?>

      </div>
      <div id="brand-selected"></div>
      <input type="hidden" id="sort-input" name="sort" value="<?=$_SESSION['sort_order'] ?? 'popular'?>">

      <span class="apply-filters-accessible sr-only" tabindex="0">apply filters</span>

    </div>
    
  </form>
  
</aside>