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
            <input id="filter-availability" type="checkbox" name="inStock" value=true>
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
            <input id="filter-gender-mens" type="checkbox" name="mens" value=true>
            <div class="checkbox">
              <i class="bi-check"></i>
            </div>
            Mens
          </label>
        </div>

        <div class="input-wrapper inline">
          <label for="filter-gender-womens" class="checkbox-container">
            <input id="filter-gender-womens" type="checkbox" name="womens" value=true>
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
          <input id="color-blue" type="checkbox" name="color-blue" value=true>
          <label for="color-blue" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(107, 107, 116)"
          >
          <input id="color-silver" type="checkbox" name="color-silver" value=true>
          <label for="color-silver" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(56, 56, 56)"
          >
          <input id="color-black" type="checkbox" name="color-black" value=true>
          <label for="color-black" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>
    
          <div class="filter-color checkbox-container"
          style="background: rgb(17, 134, 33)"
          >
          <input id="color-green" type="checkbox" name="color-green" value=true>
          <label for="color-green" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(221, 218, 23)"
          >
          <input id="color-yellow" type="checkbox" name="color-yellow" value=true>
          <label for="color-yellow" class="checkbox light-color">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(137, 21, 214)"
          >
          <input id="color-purple" type="checkbox" name="color-purple" value=true>
          <label for="color-purple" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(17, 51, 102)"
          >
          <input id="color-navy" type="checkbox" name="color-navy" value=true>
          <label for="color-navy" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(82, 52, 25)"
          >
          <input id="color-brown" type="checkbox" name="color-brown" value=true>
          <label for="color-brown" class="checkbox">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(190, 185, 135)"
          >
          <input id="color-tan" type="checkbox" name="color-tan" value=true>
          <label for="color-tan" class="checkbox light-color">
            <i class="bi-check"></i>
          </label>
          </div>

          <div class="filter-color checkbox-container"
          style="background: rgb(255, 255, 255)"
          >
          <input id="color-white" type="checkbox" name="color-white" value=true>
          <label for="color-white" class="checkbox light-color">
              <i class="bi-check"></i>
          </label>
          </div>

        </div>
      </div>
    </div>
    
    <!-- PRICE FILTER -->

    <div class="filter-group">
      <div class="filter-group-name">Price</div>
      <div class="filters">
        <div class="input-wrapper inline small">
          <span>$</span>
          <input id="filter-price-min" type="text" name="priceMin" placeholder="min." maxlength="8">
          <span>to</span>
          <input id="filter-price-max" type="text" name="priceMax" placeholder="max." maxlength="8">
        </div>
      </div>
    </div>
    
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

    <div class="filter-group">

      <!-- brand filter -->
      <div class="filter-group-name">Brands</div>
      <div class="filters">

      <?php
        // populate filters for brands that are being stocked

        include __DIR__ . '/../database/dbconnect.php';

        // get distinct brands from stock table
        $sql = 'SELECT DISTINCT brand FROM stock LEFT JOIN products USING(prod_id)';
        $brands_query = $db->query($sql);
        $brands = $brands_query->fetchAll(PDO::FETCH_ASSOC);

        foreach($brands as $brand) {
          // remove spaces from brand names with multiple words (new balance)
          $no_space = preg_replace("/\s+/", "", $brand['brand']);
          echo '
          <div class="input-wrapper inline">
            <label for="filter-brand-' . $no_space . '" class="checkbox-container">
              <input id="filter-brand-' . $no_space . '" type="checkbox" name="brand-' . $no_space . '" value=true>
              <div class="checkbox">
                <i class="bi-check"></i>
              </div>
              ' . ucwords($brand['brand']) . '
            </label>
          </div>
          ';
        }

        // terminate DB connection
        $db = null;
      ?>

      </div>

    </div>
    
  </form>
  
</div>