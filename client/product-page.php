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
  <script src="./js/modules/product-image-gallery.js" defer></script>
</head>
<body>
  <div id="root">
    

<!----------- 
    HEADER    
------------->
<?php include('./header.php');?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">



    <!-- main content column -->
    <div class="main-content">

    <div class="content-block">
      <div class="product-wrapper">

        <!-- left column -->
        <div class="product-column">

          <div class="selected-image">
            <img src="./images/product-photos/adidas-running/40560_pair_feed1000.jpg" alt="">
          </div>

          <div class="thumbnail-wrapper">
            <div class="thumbnail">
              <img src="./images/product-photos/adidas-running/40560_pair_feed1000.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="./images/product-photos/adidas-running/40560_left_feed1000.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="./images/product-photos/adidas-running/40560_right_feed1000.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="./images/product-photos/adidas-running/40560_top_feed1000.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="./images/product-photos/adidas-running/40560_back_feed1000.jpg" alt="">
            </div>
          </div>

        </div>

        <!-- right column -->
        <div class="product-column">
          <div class="product-info-wrapper">

            <!-- breadcrumbs -->
            <div class="breadcrumbs">
              <a href="#" class="text-button">Mens</a>
              <i class="bi-chevron-right"></i>
              <a href="#" class="text-button">Running</a>
              <i class="bi-chevron-right"></i>
              <a href="#" class="text-button">AirMax 2.0</a>
            </div>

            <!-- product text -->
            <div class="info-group product-text">
              <div class="brand">Adidas</div>
              <h1 class="product-title">Men's AirMax 2.0 Running Shoe</h1>
              <div class="price">$59.99</div>
            </div>

            <!-- product colors -->
            <div class="info-group">
              <h2>Colors:</h2>
              <span>Slate/Deep Blue</span>
              <div class="product-colors-wrapper">

                <div class="product-color-input">
                  <input id="color-1" type="radio" name="color">
                  <label for="color-1" class="product-color radio">
                    <div class="color-swatch primary" style="background: #a0a1a5"></div>
                    <div class="color-swatch" style="background: #182de9"></div>
                  </label>
                </div>
                
                <div class="product-color-input">
                  <input id="color-2" type="radio" name="color">
                  <label for="color-2" class="product-color radio">
                    <div class="color-swatch primary" style="background: #3f4929"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </label>
                </div>
                
              </div>
            </div>

            <!-- available sizes -->
            <div class="info-group">
              <h2>Size:</h2>
              <div class="sizes-wrapper">

                <div class="size-container">
                  <input id="size-7" type="radio" name="size" disabled>
                  <label for="size-7" class="radio">7</label>
                </div>

                <div class="size-container">
                  <input id="size-7.5" type="radio" name="size">
                  <label for="size-7.5" class="radio">7.5</label>
                </div>

                <div class="size-container">
                  <input id="size-8" type="radio" name="size">
                  <label for="size-8" class="radio">8</label>
                </div>

                <div class="size-container">
                  <input id="size-8.5" type="radio" name="size" disabled>
                  <label for="size-8.5" class="radio">8.5</label>
                </div>

                <div class="size-container">
                  <input id="size-9" type="radio" name="size">
                  <label for="size-9" class="radio">9</label>
                </div>

                <div class="size-container">
                  <input id="size-9.5" type="radio" name="size">
                  <label for="size-9.5" class="radio">9.5</label>
                </div>

                <div class="size-container">
                  <input id="size-10" type="radio" name="size">
                  <label for="size-10" class="radio">10</label>
                </div>

                <div class="size-container">
                  <input id="size-10.5" type="radio" name="size">
                  <label for="size-10.5" class="radio">10.5</label>
                </div>

                <div class="size-container">
                  <input id="size-11" type="radio" name="size">
                  <label for="size-11" class="radio">11</label>
                </div>

                <div class="size-container">
                  <input id="size-11.5" type="radio" name="size">
                  <label for="size-11.5" class="radio">11.5</label>
                </div>

                <div class="size-container">
                  <input id="size-12" type="radio" name="size">
                  <label for="size-12" class="radio">12</label>
                </div>

                <div class="size-container">
                  <input id="size-12.5" type="radio" name="size">
                  <label for="size-12.5" class="radio">12.5</label>
                </div>

                <div class="size-container">
                  <input id="size-13" type="radio" name="size">
                  <label for="size-13" class="radio">13</label>
                </div>

                <div class="size-container">
                  <input id="size-13.5" type="radio" name="size" disabled>
                  <label for="size-13.5" class="radio">13.5</label>
                </div>

                <div class="size-container">
                  <input id="size-14" type="radio" name="size" disabled>
                  <label for="size-14" class="radio">14</label>
                </div>
                
              </div>
            </div>

            <button id="add-to-cart">add to cart</button>

            <!-- item details -->
            <div class="info-group">
              <h2>Item details:</h2>
              <ul>
                <li>Adidas cloudfoam technology</li>
                <li>durable construction</li>
                <li>stretchy fabric</li>
                <li>heel and tongue pull-tabs</li>
              </ul>
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
<?php include('./footer.php');?>

</div>
</body>
</html>