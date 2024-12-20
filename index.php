<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EFC Electronic Furniture Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">EFS Electronic Furniture Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="about.php">About us</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>


    <img data-interchange="[images/efc-retina.jpg, (retina)], [images/efc-landscape.jpg, (large)], [images/efc-mobile.jpg, (mobile)], [images/efc-landscape.jpg, (medium)]">
    <noscript><img src="images/efc-landscape.jpg"></noscript>

    <div class="row" style="margin-top:10px; background-color: #808080; padding: 20px;">
      <div class="small-12">
        <h1 style="text-align:center; color: #ffffff;">Welcome to EFS Furniture Shop</h1>
          <p style="text-align:center; font-size: 1.1em; margin-top: 10px; line-height: 1.5; color: #ffffff;">
            Selamat datang di EFS Furniture Shop, destinasi terbaik Anda untuk menemukan berbagai perabot berkualitas tinggi 
            dengan desain modern dan harga terjangkau. Kami menyediakan berbagai pilihan alat elektronik. Jadikan rumah Anda 
            lebih nyaman dan indah bersama produk unggulan kami. 
            Nikmati kemudahan berbelanja dengan layanan terbaik dan penawaran menarik setiap hari!
          </p>
        </div>
    </div>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <h1>Produk Unggulan</h1>
          <?php
          include("config.php");
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products WHERE unggulan = 1');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){
            while($obj = $result->fetch_object()) {
              echo '<div class="large-12 columns" style="display: flex; align-items: center; margin-bottom: 20px;">';

              echo '<div style="flex: 1;">';
              echo '<img src="images/products/'.$obj->product_img_name.'" style="max-width: 100%; height: auto;"/>';
              echo '</div>';

              echo '<div style="flex: 2; padding-left: 20px;">';
              echo '<h3>'.$obj->product_name.'</h3>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: Rp '.$obj->price.'</p>';

              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'">';
                echo '<input type="submit" value="Add To Cart" style="background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px; cursor: pointer;" />';
                echo '</a></p>';
              } else {
                echo '<p style="color: red;">Out Of Stock!</p>';
              }

              echo '</div>'; 
              echo '</div>'; 
              $i++;
            }
          }

          $_SESSION['product_id'] = $product_id;
          ?>
      </div>
    </div>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; EFS Electronic Furniture Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
