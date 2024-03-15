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
    <title>DHDMS-cart details</title>
    <!--boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x:hidden;
    }  

      .cart_img {
    width:130px;
    height:100px;
    object-fit:contain;
}


    </style>


</head>
<body>
    <!--Navbar-->
    <div class="container-fluid p-0 ">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid"> 
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" arial-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">products</a>
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
        <a class="nav-link" href="users_area/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <sup><?php
          cart_item();?></sup></a>
        </li>
        
      </ul>      
        
      
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
 
<!--third child-->
<div class="bg-light">
  <h3 class="text-center">Direct Harvest Delivery Management System</h3>
  <p class="text-center"><b>At FreshHarvest Direct, we invite you to embark on a unique culinary journey that begins with the land and ends on your plate. Our platform connects you directly with local farmers, bringing the bounty of the harvest right to your doorstep.</b></p>
</div>

<!--fourth child-table-->
<div class="container">
  <div class="row">
    <table class="table table-bordered text-center">
        <!--php code to display dynamic data-->
        <?php   
          $get_ip_add = getIPAddress();
          $total_price=0;
          $cart_query="Select * from `cart_details` where  ip_address='$get_ip_add'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          //add table header row
          if($result_count>0){
            echo "<thead>
            <tr>
              <th>product_title</th>
              <th>product_image</th>
              <th>Quantity</th>
              <th>Sub Total</th>
              <th colspan='2'>Operations</th>
            </tr>
          </thead>
          <tbody>";
          // add table data rows
          while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $quantity = $row['quantity'];
            $select_products="Select * from `products` where  product_id='$product_id'";
            $result_product=mysqli_fetch_array(mysqli_query($con,$select_products));
            $product_price=$result_product['product_price'];
            $product_title=$result_product['product_title'];
            $product_image1=$result_product['product_image1'];
            $product_suptotal= $quantity * $product_price;
            $total_price+=$product_suptotal;     //500
      ?>

          <form action="" method="post" name="<?php echo $product_id?>">
          <tr>
              <td><?php echo $product_title?></td>
              <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
              <td>
                <input type="text" name="qty" id="" class="form-input w-50" value="<?php echo $quantity?>">
                <input type="hidden" name="productId" id="" class="form-input w-50" value="<?php echo $product_id?>" >
              </td>
              <td><?php echo $product_suptotal ?>/-</td>
              <td>
                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
              </td>
        </tr>
          </form>
        <?php    }}
        else{
          echo "<h2 class='text center text-danger'>Cart is empty</h2>";
        }
        ?>
      </tbody>
    </table>

    <!--subtotal-->
    <div class="d-flex mb-5">
      <?php
      $get_ip_add = getIPAddress();
      $cart_query="Select * from `cart_details` where  ip_address='$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){
        echo " <h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price /- </strong></h4>
        <form action=\"\" method=\"post\">
        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
        <button class='bg-secondary px-3  py-2 border-0 '><a href='./users_area/payment.php' class='text-light text-decoration-none' >Checkout</a></button>
        </form>";
      }else{
       echo "<form action=\"\" method=\"post\">
       <input type='submit' value='Continue Shopping' 
       class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'></form>";
      }
      if(isset($_POST['continue_shopping'])){
        echo "<script>window.open('index.php','_self')</script>";
      }

      ?>
      
    </div>
  </div>
    </div>
<!-- function to remove item -->
<?php
  if(isset($_POST['remove_cart'])) {
    $product_id=$_POST['productId'];
    $delete_query= "Delete from `cart_details` where product_id=$product_id and ip_address='$get_ip_add'";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
      echo "<meta http-equiv='refresh' content='0'>";
    }
  }
?> 

<?php
    if(isset($_POST['update_cart'])) {
      $quantities=$_POST['qty'];
      $product_id=$_POST['productId'];
      echo $_POST['qty']."and id".$product_id;
      $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add' and product_id = '$product_id'";
      $result_products_quantity=mysqli_query($con,$update_cart);
      $total_price=(int)$total_price * (int)$quantity;
      echo "<meta http-equiv='refresh' content='0'>";
    } 
?>


<!--last child-->
<!--include footer-->
<?php include("./includes/footer.php")?>
</div>




<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>