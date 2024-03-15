<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!--boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
<style>
.payment_img{
    width:90%;
    margin:auto;
    display:block;
}
</style>
<body>
<div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid"> 
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>
</div>
    <!-- php code to access user id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>

   <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/PayPal.webp" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo  $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
        
   </div>
    <!--last child-->
    <!--include footer-->

<div>
    <tr>
        .
    </tr>
</div>
<div>
    <tr>
        .
    </tr>
</div>
<?php include("../includes/footer.php")?>
</div>
</body>
</html>