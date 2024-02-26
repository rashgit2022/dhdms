<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file -->
    <link rel="stylesheet" href="../style.css">
    
<style>
/* .admin_image{
    width: 100px;
    object-fit:contain:
} */
.footer{
    position: absolute;
    bottom:0;
}
body{
    overflow-x:hidden;
}
.product_img{
    width:100px;
    object-fit:contain;
}
</style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0 nn">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav h5 p-7">
                    <!-- <img src="<?php echo $result_admin['admin_image']; ?>" alt="" class="cart_img"> -->
                    <?php
                    session_start();
                    //error_reporting(0);
                   $adminprofile=$_SESSION['admink_name'];
                   if($adminprofile==true){

                   }else{
                    header('location:admin_login.php');
                   }
                     echo "Welcome ". $adminprofile;
                    $select_query="Select * from `admin_table` where admin_name='$adminprofile' ";
                    $result=mysqli_query($con,$select_query);
                    $result_admin=mysqli_fetch_assoc($result);
                    

                        ?>
                     
                        
                    </ul>
                </nav>
            <div>
        </nav>
    
        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2"> Manage details</h3>
        </div>

        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-5 align-item-center ">
                
                <div class="button text-center" >
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1" >Insert products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>

        </div>

        <!--fourth child-->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            
            ?>
        </div>

            <!-- last child -->
            <!-- <div class="bg-info p-3 text-center footer">
                <p>Copyright © 2024 Direct Harvest Delivery Management System. All Rights Reserved.</p>
            </div> -->
            <?php include("../includes/footer.php")?>



    </div>
    <!--Boostrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

</body>
</html>
