
<div class="sidebar-container">

  <div class="filter-sort-container">

    <div class="filter-sort-left">

      <div class="filter-sort-wrapper">
        <div class="filter-icon icon-link">
          <i class="bi-funnel"></i>
        </div>
        <div class="sort-icon icon-link">
          <i class="bi-arrow-down-up"></i>
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
          <span class="sort-option" data-sort="popular">popular</span>
          <span class="sort-option" data-sort="price-asc">price: low to high</span>
          <span class="sort-option" data-sort="price-desc">price: high to low</span>
        </div>
      </div>

    </div>
    
    <div class="filter-sort-right">

      <div
        class="filter-submit-button text-button"
        onclick="validateProductFilters()"
      >
        <i class="bi-arrow-clockwise"></i>
        update search
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
          <label for="filter-availability" class="checkbox-container">
            <input
              id="filter-availability"
              type="checkbox" name="inStock"
              value=true
              <?=($_REQUEST['inStock']==='true') ? 'checked' : '';?>

            >
            <div class="checkbox">
              <i class="bi-check"></i>
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
          <label for="filter-gender-mens" class="checkbox-container">
            <input
              id="filter-gender-mens"
              type="checkbox"
              name="mens"
              value=true
              <?=($_REQUEST['mens']==='true') ? 'checked' : '';?>
            >
            <div class="checkbox">
              <i class="bi-check"></i>
            </div>
            Mens
          </label>
        </div>

        <div class="input-wrapper inline">
          <label for="filter-gender-womens" class="checkbox-container">
            <input
              id="filter-gender-womens"
              type="checkbox"
              name="womens"
              value=true
              <?=($_REQUEST['womens']==='true') ? 'checked' : '';?>
            >
            <div class="checkbox">
              <i class="bi-check"></i>
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

              // give the white filter color a darker check so it is visible
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
              <input id="'.$filter_color.'" type="checkbox" name="filter-color-'.$filter_color.'" value=true
              ' . $checked . '
              >
              <label for="'.$filter_color.'" class="checkbox '.$light_filter_class.'">
                <i class="bi-check"></i>
              </label>
              </div>
              ';
            }
          
          /*
            <div class="filter-color checkbox-container"
            style="background: rgb(214, 21, 21)"
            >
            <input id="red" type="checkbox" name="filter-color-red" value=true
            <?=($_REQUEST['filter-color-red']==='true') ? 'checked' : '';?>
            >
            <label for="red" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            
            <div class="filter-color checkbox-container"
            style="background: rgb(107, 107, 116)"
            >
            <input id="grey" type="checkbox" name="filter-color-grey" value=true
            <?=($_REQUEST['filter-color-grey']==='true') ? 'checked' : '';?>
            >
            <label for="grey" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(56, 56, 56)"
            >
            <input id="black" type="checkbox" name="filter-color-black" value=true
            <?=($_REQUEST['filter-color-black']==='true') ? 'checked' : '';?>
            >
            <label for="black" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(17, 134, 33)"
            >
            <input id="green" type="checkbox" name="filter-color-green" value=true
            <?=($_REQUEST['filter-color-green']==='true') ? 'checked' : '';?>
            >
            <label for="green" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(221, 218, 23)"
            >
            <input id="yellow" type="checkbox" name="filter-color-yellow" value=true
            <?=($_REQUEST['filter-color-yellow']==='true') ? 'checked' : '';?>
            >
            <label for="yellow" class="checkbox light-color">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(137, 21, 214)"
            >
            <input id="purple" type="checkbox" name="filter-color-purple" value=true
            <?=($_REQUEST['filter-color-purple']==='true') ? 'checked' : '';?>
            >
            <label for="purple" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(19, 91, 207)"
            >
            <input id="blue" type="checkbox" name="filter-color-blue" value=true
            <?=($_REQUEST['filter-color-blue']==='true') ? 'checked' : '';?>
            >
            <label for="blue" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(82, 52, 25)"
            >
            <input id="brown" type="checkbox" name="filter-color-brown" value=true
            <?=($_REQUEST['filter-color-brown']==='true') ? 'checked' : '';?>>
            <label for="brown" class="checkbox">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(190, 185, 135)"
            >
            <input id="tan" type="checkbox" name="filter-color-tan" value=true
            <?=($_REQUEST['filter-color-tan']==='true') ? 'checked' : '';?>
            >
            <label for="tan" class="checkbox light-color">
              <i class="bi-check"></i>
            </label>
            </div>
            
            <div class="filter-color checkbox-container"
            style="background: rgb(255, 255, 255)"
            >
            <input id="white" type="checkbox" name="filter-color-white" value=true
            <?=($_REQUEST['filter-color-white']==='true') ? 'checked' : '';?>
            >
            <label for="white" class="checkbox light-color">
                <i class="bi-check"></i>
            </label>
            </div>
            */
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
        <div class="input-wrapper inline small">
          <span>$</span>
          <input id="filter-price-min" type="text" name="priceMin" placeholder="min." maxlength="8"
          value=<?=$_REQUEST['priceMin'] ?? '';?>
          >
          <span>to</span>
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
            <label for="filter-type-' . $type['shoe_type'] . '" class="checkbox-container">
              <input
                id="filter-type-' . $type['shoe_type'] . '"
                type="checkbox"
                name="type-filter-' . $type['shoe_type'] . '"
                value="'.$type['shoe_type'].'" ' . 
                $checked . '
              >
              <div class="checkbox">
                <i class="bi-check"></i>
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
            <label for="filter-brand-' . $no_space . '" class="checkbox-container">
              <input
                id="filter-brand-' . $no_space . '"
                type="checkbox"
                name="brand-filter-' . $no_space . '"
                value="'.$brand['brand'].'" ' . 
                $checked . '
              >
              <div class="checkbox">
                <i class="bi-check"></i>
              </div>
              ' . ucwords($brand['brand']) . '
            </label>
          </div>
          ';
        }


      ?>

      </div>
      <div id="brand-selected"></div>

    </div>
    
  </form>
  
</div>