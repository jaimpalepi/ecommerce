<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="seller") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || EFS Electronic Furniture Shop</title>
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
          <li><a href="admin.php">Products</a></li>
          <li><a href="admin-orders.php">Orders</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="admin-account.php">Account</a></li>';
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


    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Hey Seller!</h3>
        <form method="POST" action="seller-insert.php" enctype="multipart/form-data">
            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Product Code</label>
              </div>
              <div class="small-8 columns">
                <input type="text" id="right-label" name="code">
              </div>
            </div>
            
            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Product Name</label>
              </div>
              <div class="small-8 columns">
                <input type="text" id="right-label" name="name">
              </div>
            </div>

            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Product Description</label>
              </div>
              <div class="small-8 columns">
                <input type="text" id="right-label" name="desc">
              </div>
            </div>

            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Product Image</label>
              </div>
              <div class="small-8 columns">
                <input type="file" name="img">
              </div>
            </div>

            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Quantity</label>
              </div>
              <div class="small-8 columns">
                <input type="text" id="right-label" name="qty">
              </div>
            </div>

            <div class="row">
              <div class="small-4 columns">
                <label for="right-label" class="right inline">Price</label>
              </div>
              <div class="small-8 columns">
                <input type="text" id="right-label" name="price">
              </div>
            </div>

            <input type="submit" id="right-label" value="Tambah Produk" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">

                      
        </form>
      </div>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; EFS. All Rights Reserved.</p>
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
