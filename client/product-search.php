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

    <!-- Filter sidebar -->
    <div class="sidebar-container">
      <div class="filters-wrapper">

        <div class="filter-group">

          <div class="filter-group-name">Availability</div>
          <div class="filters">

            <div class="input-wrapper inline">
              <label for="filter-availability" class="checkbox-container">
                <input id="filter-availability" type="checkbox" name="inStock">
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
                <input id="filter-gender-mens" type="checkbox" name="mens">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Mens
              </label>
            </div>

            <div class="input-wrapper inline">
              <label for="filter-gender-womens" class="checkbox-container">
                <input id="filter-gender-womens" type="checkbox" name="womens">
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
              <input id="color-blue" type="checkbox">
              <label for="color-blue" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(107, 107, 116)"
              >
              <input id="color-silver" type="checkbox">
              <label for="color-silver" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(56, 56, 56)"
              >
              <input id="color-black" type="checkbox">
              <label for="color-black" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>
        
              <div class="filter-color checkbox-container"
              style="background: rgb(17, 134, 33)"
              >
              <input id="color-green" type="checkbox">
              <label for="color-green" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(221, 218, 23)"
              >
              <input id="color-yellow" type="checkbox">
              <label for="color-yellow" class="checkbox light-color">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(137, 21, 214)"
              >
              <input id="color-purple" type="checkbox">
              <label for="color-purple" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(17, 51, 102)"
              >
              <input id="color-navy" type="checkbox">
              <label for="color-navy" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(82, 52, 25)"
              >
              <input id="color-brown" type="checkbox">
              <label for="color-brown" class="checkbox">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(190, 185, 135)"
              >
              <input id="color-tan" type="checkbox">
              <label for="color-tan" class="checkbox light-color">
                <i class="bi-check"></i>
              </label>
              </div>

              <div class="filter-color checkbox-container"
              style="background: rgb(255, 255, 255)"
              >
              <input id="color-white" type="checkbox">
              <label for="color-white" class="checkbox light-color">
                  <i class="bi-check"></i>
              </label>
              </div>
              
              
              
              
            </div>
          </div>
        </div>
        
        <div class="filter-group">
          <div class="filter-group-name">Price</div>
          <div class="filters">
            <div class="input-wrapper inline small">
              <span>$</span>
              <input id="filter-price-min" type="text" name="priceMin" placeholder="min.">
              <span>to</span>
              <input id="filter-price-max" type="text" name="priceMax" placeholder="max.">
            </div>
          </div>
        </div>
        
        <div class="filter-group">
          <div class="filter-group-name">Size</div>
          <div class="filters">
            <div class="filter-sizes-wrapper">
              
              <div class="filter-size checkbox-container">
                <input id="size-7" type="checkbox">
                <label for="size-7" class="checkbox">7</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-7.5" type="checkbox">
                <label for="size-7.5" class="checkbox">7.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-8" type="checkbox">
                <label for="size-8" class="checkbox">8</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-8.5" type="checkbox">
                <label for="size-8.5" class="checkbox">8.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-9" type="checkbox">
                <label for="size-9" class="checkbox">9</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-9.5" type="checkbox">
                <label for="size-9.5" class="checkbox">9.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-10" type="checkbox">
                <label for="size-10" class="checkbox">10</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-10.5" type="checkbox">
                <label for="size-10.5" class="checkbox">10.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-11" type="checkbox">
                <label for="size-11" class="checkbox">11</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-11.5" type="checkbox">
                <label for="size-11.5" class="checkbox">11.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-12" type="checkbox">
                <label for="size-12" class="checkbox">12</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-12.5" type="checkbox">
                <label for="size-12.5" class="checkbox">12.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-13" type="checkbox">
                <label for="size-13" class="checkbox">13</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-13.5" type="checkbox">
                <label for="size-13.5" class="checkbox">13.5</label>
              </div>
              <div class="filter-size checkbox-container">
                <input id="size-14" type="checkbox">
                <label for="size-14" class="checkbox">14</label>
              </div>
              
              
            </div>
          </div>
        </div>

        <div class="filter-group">
    
          <!-- brand filter -->
          <div class="filter-group-name">Brands</div>
          <div class="filters">
    
            <div class="input-wrapper inline">
              <label for="filter-brand-adidas" class="checkbox-container">
                <input id="filter-brand-adidas" type="checkbox" name="adidas">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Adidas
              </label>
            </div>
    
            <div class="input-wrapper inline">
              <label for="filter-brand-nike" class="checkbox-container">
                <input id="filter-brand-nike" type="checkbox" name="nike">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Nike
              </label>
            </div>
            
            <div class="input-wrapper inline">
              <label for="filter-brand-newbalance" class="checkbox-container">
                <input id="filter-brand-newbalance" type="checkbox" name="newbalance">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                New Balance
              </label>
            </div>
            
            <div class="input-wrapper inline">
              <label for="filter-brand-vans" class="checkbox-container">
                <input id="filter-brand-vans" type="checkbox" name="vans">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Vans
              </label>
            </div>
            
            <div class="input-wrapper inline">
              <label for="filter-brand-heydude" class="checkbox-container">
                <input id="filter-brand-heydude" type="checkbox" name="heydude">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Hey Dude
              </label>
            </div>
            
            <div class="input-wrapper inline">
              <label for="filter-brand-converse" class="checkbox-container">
                <input id="filter-brand-converse" type="checkbox" name="converse">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Converse
              </label>
            </div>
            
            <div class="input-wrapper inline">
              <label for="filter-brand-dockers" class="checkbox-container">
                <input id="filter-brand-dockers" type="checkbox" name="dockers">
                <div class="checkbox">
                  <i class="bi-check"></i>
                </div>
                Dockers
              </label>
            </div>


          </div>
    
        </div>
        
      </div>
    </div>
    
    <!-- main content column -->
    <div class="main-content">
      
      <!-- Product search results -->
      <div class="content-block">
        
        <div class="results-found">results for <span id="search-term">vans mte</span></div>

      <div class="product-card-container card">
        <div class="product-cards">
          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>

          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>

          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>

          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>

          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>
          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>
          
          <div class="product-card-wrapper">
            <a href="#" class="product-card">
                <div class="badge">new</div>
                <div class="product-card-image">
                  <img src="./images/thumbnails/monarch-white-silver.jpg" alt="nike-monarch">
                </div>
                <div class="product-colors-wrapper">
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #1a2a47"></div>
                    <div class="color-swatch" style="background: silver"></div>
                  </div>
                  <div class="product-color">
                    <div class="color-swatch primary" style="background: #c71616"></div>
                    <div class="color-swatch" style="background: #202020"></div>
                  </div>
                </div>
                <div class="product-info">
                  <div class="brand">Nike</div>
                  <div class="product-name">Monarch</div>
                  <div class="price">$59.99</div>
                </div>
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- Pagination -->

    <div class="content-block">
      <div class="pagination-container">
        <div class="pagination-wrapper">

          <div class="page-buttons">
            <button class="prev"><i class="bi-caret-left-fill"></i>prev</button>
            <button class="next">next<i class="bi-caret-right-fill"></i></button>
          </div>

          <div class="page-numbers">
            <a href="#" class="selected">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">4</a>
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