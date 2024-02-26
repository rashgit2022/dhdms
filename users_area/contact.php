<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php  echo $_SESSION['username']?></title>
    <!--boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
    body{
        overflow-x:hidden;
    }    
    .profile_img{
    width:90%;
    margin:auto;
    display:block;
    /*height:100%;*/
    object-fit:contain;
    }
    .edit_image{
        width: 100px;
        height: 100px;
        object-fit:contain;
    }
    </style>

</head>
<body>
    <!--Navbar-->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid"> 
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link active" arial-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../users_area/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart"></i>
          <sup><?php
          cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php  total_cart_price();?>/-</a>
        </li>
      </ul>      
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control mr-sm-2" type="search" 
        placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
    </div>
</nav>
<!--calling cart function-->
<?php 
cart();
?>

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
    <a class='nav-link' href='../users_area/user_login.php'>Login</a>
      </li>";
    }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='../users_area/logout.php'>Logout</a>
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

	<div class="form-container ">
		<form name="frmContact" id="" frmContact"" method="post" action=""
			enctype="multipart/form-data" onsubmit="return validateContactForm()">

			<div class="input-row ">
				<label style="padding-top: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label> <span
					id="userName-info" class="info"></span><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"
					class="input-field" name="userName" id="userName" />
			</div>
			<div class="input-row">
				<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</label> <span id="userEmail-info" class="info"></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" class="input-field" name="userEmail"
					id="userEmail" />
			</div>
			<div class="input-row">
				<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject</label> <span id="subject-info" class="info"></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" class="input-field" name="subject" id="subject" />
			</div>
			<div class="input-row">
				<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Message</label> <span id="userMessage-info" class="info"></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<textarea name="content" id="content" class="input-field" cols="60"
					rows="6"></textarea>
			</div>
            <br/>
			<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="send" class="btn btn-success" value="Send" />  <input type="button" value="Back" class="btn btn-primary" onclick="history.go(-1)">


				<div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>
			</div>
           
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"
		type="text/javascript"></script>
	<!-- include JavaScript validation here -->
    <?php

function strip_crlf($string)
{
    return str_replace("\r\n", "", $string);
}

if (! empty($_POST["send"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $toEmail = "rashmisandamini1999@gmail.com";
    // CRLF Injection attack protection
    $name = strip_crlf($name);
    $email = strip_crlf($email);
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
    }
}
require_once "contact.php";
?>

<br/>
<!--last child-->
<!--include footer-->
<?php include("../includes/footer.php")?>
</div>

</body>
</html>