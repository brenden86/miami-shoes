
<?php
  // import DB connection and functions
  include_once __DIR__ . '/../database/dbconnect.php';
?>

<div class="sidebar-container">
  
  <form
    id="product-filters-form"
    action=""
    method="GET"
    class="filters-wrapper"
  >
    
    <!-- update search button; executes query based on filters selected -->
    <div
      class="filter-submit-button text-button"
      onclick="validateProductFilters()"
    >
      <i class="bi-arrow-clockwise"></i>
      update search
    </div>
    
    <div class="filter-group">

      <div class="filter-group-name">Availability</div>
      <div class="filters">

        <div class="input-wrapper inline">
          <label for="filter-availability" class="checkbox-container">
            <input id="filter-availability" type="checkbox" name="inStock" value=true
            <?php
              if($_REQUEST['inStock']==='true') {
                echo 'checked';
              }
            ?>
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
            <input id="filter-gender-mens" type="checkbox" name="mens" value=true
            <?php
              if($_REQUEST['mens']==='true') {
                echo 'checked';
              }
            ?>
            >
            <div class="checkbox">
              <i class="bi-check"></i>
            </div>
            Mens
          </label>
        </div>

        <div class="input-wrapper inline">
          <label for="filter-gender-womens" class="checkbox-container">
            <input id="filter-gender-womens" type="checkbox" name="womens" value=true
            <?php
              if($_REQUEST['womens']==='true') {
                echo 'checked';
              }
            ?>
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
          
          <div class="filter-color checkbox-container"
          style="background: rgb(214, 21, 21)"
          >
          <input id="red" type="checkbox" name="filter-color-red" value=true
          <?php
            if($_REQUEST['filter-color-red']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="red" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(107, 107, 116)"
          >
          <input id="grey" type="checkbox" name="filter-color-grey" value=true
          <?php
            if($_REQUEST['filter-color-grey']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="grey" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(56, 56, 56)"
          >
          <input id="black" type="checkbox" name="filter-color-black" value=true
          <?php
            if($_REQUEST['filter-color-black']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="black" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>
    
          <div class="filter-color checkbox-container"
          style="background: rgb(17, 134, 33)"
          >
          <input id="green" type="checkbox" name="filter-color-green" value=true
          <?php
            if($_REQUEST['filter-color-green']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="green" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(221, 218, 23)"
          >
          <input id="yellow" type="checkbox" name="filter-color-yellow" value=true
          <?php
            if($_REQUEST['filter-color-yellow']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="yellow" class="checkbox light-color">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(137, 21, 214)"
          >
          <input id="purple" type="checkbox" name="filter-color-purple" value=true
          <?php
            if($_REQUEST['filter-color-purple']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="purple" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(19, 91, 207)"
          >
          <input id="blue" type="checkbox" name="filter-color-blue" value=true
          <?php
            if($_REQUEST['filter-color-blue']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="blue" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(82, 52, 25)"
          >
          <input id="brown" type="checkbox" name="filter-color-brown" value=true
          <?php
            if($_REQUEST['filter-color-brown']==='true') {
              echo 'checked';
            }
          ?>>
          <label for="brown" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(190, 185, 135)"
          >
          <input id="tan" type="checkbox" name="filter-color-tan" value=true
          <?php
            if($_REQUEST['filter-color-tan']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="tan" class="checkbox light-color">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(255, 255, 255)"
          >
          <input id="white" type="checkbox" name="filter-color-white" value=true
          <?php
            if($_REQUEST['filter-color-white']==='true') {
              echo 'checked';
            }
          ?>
          >
          <label for="white" class="checkbox light-color">
              <i class="bi-check"></i>
          </label>
          </div>

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
          value=<?=$_REQUEST['priceMin']?>
          >
          <span>to</span>
          <input id="filter-price-max" type="text" name="priceMax" placeholder="max." maxlength="8"
          value=<?=$_REQUEST['priceMax']?>
          >
        </div>
      </div>
    </div>

    <?php /*

    REMOVING SIZE for the time being. Probably not needed as a filter.
    
    <div class="filter-group">
      <div class="filter-group-name">Size</div>
      <div class="filters">
        <div class="filter-sizes-wrapper">

          <?php
            $size = 7;
            while ($size <= 14) {
              echo '
              <div class="filter-size checkbox-container">
                <input id="size-'.$size.'" type="checkbox" name="size-'.$size.'" value=true>
                <label for="size-'.$size.'" class="checkbox">'.$size.'</label>
              </div>
              ';
              $size += .5;
            }
          ?>
          
        </div>
      </div>
    </div>

    */ ?>

    <div class="filter-group">
      <!-- type filter -->
      <div class="filter-group-name">Shoe Type</div>
      <div class="filters">
        
      <?php

        // get distinct shoe types from products in stock
        $types = queryAndFetch('SELECT DISTINCT shoe_type FROM stock LEFT JOIN products USING(prod_id) ORDER BY shoe_type DESC');

        foreach($types as $type) {
          echo '
          <div class="input-wrapper inline shoe-type-input">
            <label for="filter-type-' . $type['shoe_type'] . '" class="checkbox-container">
              <input id="filter-type-' . $type['shoe_type'] . '" type="checkbox" name="type-filter-' . $type['shoe_type'] . '" value="'.$type['shoe_type'].'"
              ';
              // persist selection
              if($_REQUEST['type-filter-'.$type['shoe_type']]===$type['shoe_type']) {
                echo 'checked';
              }
              echo '
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
        $brands = queryAndFetch('SELECT DISTINCT brand FROM stock LEFT JOIN products USING(prod_id)');

        foreach($brands as $brand) {
          // remove spaces from brand names with multiple words (new balance)
          $no_space = preg_replace("/\s+/", "", $brand['brand']);
          echo '
          <div class="input-wrapper inline brand-input">
            <label for="filter-brand-' . $no_space . '" class="checkbox-container">
              <input id="filter-brand-' . $no_space . '" type="checkbox" name="brand-filter-' . $no_space . '" value="'.$brand['brand'].'"';
              if($_REQUEST['brand-filter-'.$brand['brand']]===$brand['brand']) {
                echo 'checked';
              }
              echo '
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