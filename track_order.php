<?php
include('includes/connect.php');
include('functions/common_function.php');
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
      

.subscribe_now h4 {
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #34495e;
  font-weight: 800;
  text-align: center;
}
.subscribe_now p {
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 2px;
  color: #34495e;
  text-align: center;
}

.subscribe_form {
  max-width: 470px;
  width: 100%;
  margin: 0 auto;
  box-shadow: 0px 2px 5px 0px rgba(10, 6, 20, 0.24);
}
.subscribe_form:focus {
  outline: none;
}
.subscribe_form .form-control {
  border: none;
}
.subscribe_form .form-control:focus {
  box-shadow: none;
}
.subscribe_form input {
  height: 44px;
}
.subscribe_form button {
  border: none;
  height: 44px;
  background-color: #0ed085;
  color: #fff;
  margin: -1px;
  border-radius: 0;
  width: 135px;
  text-transform: uppercase;
  position: relative;
  transition: all ease 0.3s;
  -webkit-transition: all ease 0.3s;
  -moz-transition: all ease 0.3s;
  -o-transition: all ease 0.3s;
  -ms-transition: all ease 0.3s;
}
.subscribe_form button:hover, .subscribe_form button:focus, .subscribe_form button:active, .subscribe_form button:visited {
  color: #fff;
  background-color: rgba(14, 208, 133, 0.77);
  outline: none;
  transition: all ease 0.3s;
  -webkit-transition: all ease 0.3s;
  -moz-transition: all ease 0.3s;
  -o-transition: all ease 0.3s;
  -ms-transition: all ease 0.3s;
}
.subscribe_form button:hover:before, .subscribe_form button:focus:before, .subscribe_form button:active:before, .subscribe_form button:visited:before {
  background-color: rgba(14, 208, 133, 0.77);
  transition: all ease 0.3s;
  -webkit-transition: all ease 0.3s;
  -moz-transition: all ease 0.3s;
  -o-transition: all ease 0.3s;
  -ms-transition: all ease 0.3s;
}
.subscribe_form button:before {
  content: "";
  position: absolute;
  top: 100%;
  left: 0;
  height: 1px;
  background-color: #0ed085;
  width: 100%;
  transition: all ease 0.3s;
  -webkit-transition: all ease 0.3s;
  -moz-transition: all ease 0.3s;
  -o-transition: all ease 0.3s;
  -ms-transition: all ease 0.3s;
}
.subscribe_form .input-group-btn:last-child > .btn, .subscribe_form .input-group-btn:last-child > .btn-group {
  z-index: 2;
  margin-left: 0px;
}
</style>

</head>
<body>
    <!--Navbar-->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid"> 
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" arial-current="page" href="./index.php">
            Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./display_all.php">products</a>
        </li>
        <li class="nav-item">
        <?php
        if(isset($_SESSION['username'])){
         echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
      
        ?>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./users_area/contact.php">Contact</a>
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
    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
    }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li>";
    }
    ?>
    
       

  </ul>
</nav>
 

</head>
<body>
<div id="subscription_area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 mt-5">
        <div class="subscribe_now">
          <h4>Track your Order Now</h4>
          <p></p>
          <form class="subscribe_form">
            <div class="input-group">
               <input type="text" class="form-control" name="email" placeholder="Type your order ID...">
               <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Track Now</button>
               </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>