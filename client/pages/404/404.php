<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Miami Shoes</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/main.css">
    <script src="/pages/404/app.js" type="module" defer></script>
    <script src="/js/accessibility.js" type="module" defer></script>

  </head> 
  <body>
    <div id="root">
      
<!----------- 
    HEADER    
------------->
<?php include '../../components/header.php';?>

<!------------------
    MAIN CONTENT    
-------------------->

<main>
  <div class="main-content-wrapper">
    
    <section class="main-content">

    <div class="page-not-found-container">
      <h1>Oops!</h1>
      <p>We didn't find the page you were looking for.</p>
      <span>
        <?php
          if(preg_match('/'.$_SERVER['SERVER_NAME'].'/', $_SERVER['HTTP_REFERER'])) {
            echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Back</a> | ';
          }
        ?>
        <a href="/">Home</a>
      </span>
    </div>
    
    </section>

  </div>
</main>



<!----------- 
    FOOTER    
------------->
<?php include '../../components/footer.php';?>

</div>
</body>
</html>