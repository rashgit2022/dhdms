<?php include('../includes/connect.php');
include('../functions/common_function.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_reg.jpg" alt="admin_registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_adminname" class="form-label">Username</label>
                        <input type="text" id="admin_adminname" name="admin_adminname" 
                        placeholder="Enter your username" required="required" 
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" 
                        placeholder="Enter your Email" required="required" 
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" 
                        placeholder="Enter your Password" required="required" 
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_admin_password" name="conf_admin_password" 
                        placeholder="Enter your Confirm Password" required="required" 
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label"> Image</label>
                        <input type="file" id="admin_image" name="admin_image" class="form-control"/>
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_register" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already an account? 
                            <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['admin_register'])){
    $admin_adminname=$_POST['admin_adminname'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $admin_image=$_FILES['admin_image']['name'];
    $user_image_tmp=$_FILES['admin_image']['tmp_name'];
    
    
    //select query
    $select_query="Select * from `admin_table` where admin_name='$admin_adminname' 
    or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo"<script>alert('This Admin name or email already exist')</script>";
    }else if($admin_password!=$conf_admin_password){
         echo"<script>alert('Password Do not match')</script>";
    }
    else{
        //insert_query
    move_uploaded_file($user_image_tmp,"./admin_images/$admin_image");
    $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password, admin_image) 
    values ('$admin_adminname','$admin_email','$hash_password','$admin_image')";
    $sql_execute=mysqli_query($con,$insert_query);
    }

    
    
    
   
    
}

?>






