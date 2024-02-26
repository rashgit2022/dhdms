<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_reg.jpg" alt="admin_registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" >
                    <!-- adminname field -->
                    <div class="form-outline mb-4">
                        <label for="admin_adminname" class="form-label">Username</label>
                        <input type="text" id="admin_adminname" name="admin_name" 
                        placeholder="Enter your username" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>
                    
                      <!-- admin password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" 
                        placeholder="Enter your Password" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>
                    
                    <!-- submit  -->
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? 
                            <a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_adminname=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
   

    
    
    $select_query="Select * from admin_table where admin_name='$admin_adminname'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    

    if($row_count>0){
        if(password_verify($admin_password,$row_data['admin_password'])){
            $_SESSION['admink_name']=$admin_adminname;
            echo"<script>alert('Login Successful')</script>";
            echo "<script>window.open('../admin_area/index.php','_self')</script>";{
            }
        }else{
         echo "<script>alert('Invalid Credentials')</script>";
        }
        
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }

} 
?> 

