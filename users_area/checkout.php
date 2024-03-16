<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DHDMS-Checkout Page</title>
    <!--boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      .logo{
        width:7%;
        height:75%;
      }
    </style>

</head>
<body>
    <!--Navbar-->
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid"> 
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" arial-current="page" href="../index.php">
            Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">products</a>
        </li>
        <li class="nav-item">
        <?php
        if(isset($_SESSION['username'])){
         echo "<li class='nav-item'>
          <a class='nav-link' href='../users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
      
        ?>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../users_area/contact.php">Contact</a>
        </li>
          </ul>      
        
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control mr-sm-2" t ype="search" 
        placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
  <ul class="navbar-nav me-auto">
   
    <?php
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome " . $_SESSION['username']."</a>
      </li>";
    }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
    <a class='nav-link' href='./user_login.php'>Login</a>
      </li>";
    }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
    </li>";
    }
    ?>
       

  </ul>
</nav>
 
<!--third child-->
<div class="bg-light">
  <h3 class="text-center">Direct Harvest Delivery Management System</h3>
  <p class="text-center"><b>At FreshHarvest Direct, we invite you to embark on a unique culinary journey that begins with the land and ends on your plate. Our platform connects you directly with local farmers, bringing the bounty of the harvest right to your doorstep.</b></p>
</div>

<!--fourth child-->
<div class="row px-1">
  <div class="col-md-12">
    <!--products-->
      <div class="row">
        <?php
        if(!isset($_SESSION['username'])){
include('user_login.php');
        }else{
            include('payment.php');
        }
        ?>

    </div>


<!--col end-->
</div>
  
</div>








<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>