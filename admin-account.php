<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">BOLT Sports Shop</a></h1>
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
        <h3>Account List</h3>
        <hr>

        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from users");
          if($result) {
            while($obj = $result->fetch_object()) {
              //echo '<div class="large-6">';
              echo '<p><h4>User Name ->'.$obj->fname.' '.$obj->lname.'</h4></p>';
              echo '<p><h4>Address ->'.$obj->address.'</h4></p>';
              echo '<p><strong>City</strong>: '.$obj->city.'</p>';
              echo '<p><strong>Email</strong>: '.$obj->email.'</p>';
              echo '<p><strong>Type</strong>: '.$obj->type.'</p>';
              if($obj->type=="user"){echo '<a href="change.php?id=' . urlencode($obj->id) . '">Set as Seller</a><br>';}
              if($obj->type=="seller"){echo '<a href="change.php?id=' . urlencode($obj->id) . '">Set as User</a><br>';}
              if($obj->type!="admin"){echo '<a href="hapus.php?id=' . urlencode($obj->id) . '">Hapus Akun</a>';}
              
            }
          }
        ?>
      </div>
    </div>




    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; EFS Furniture Shop. All Rights Reserved.</p>
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
