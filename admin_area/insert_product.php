<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    

    //accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    

    //checking Empty condition
    if($product_title=='' or 
    $description=='' or 
    $product_keywords=='' or 
    $product_category=='' or 
    $product_price=='' or 
    $product_image1=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        

        //insert query
        $insert_products="insert into `products` (product_title,product_description,
        product_keywords,category_id,product_image1, product_price,date,status) values ('$product_title','$description',
        '$product_keywords','$product_category','$product_image1',
        '$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    }

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta htttp-equiv="X-UA-Conpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products-Admin Dashboard</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for ="product title" class="form-label"> product title </label>
                <input type="text" name="product title" id="product title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">

            </div>

            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for ="description" class="form-label"> product description </label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">

            </div>

                <!--keywords-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for ="product_keywords" class="form-label"> product keywords </label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">

            </div>
            <br/>

            <!--categories-->
            <div class="form-outline mb-4 w-50 m-auto ">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                    
                </select>  
            </div>
            <br/>

                <!--Image 1-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label1">product image </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
                

                <!--Price-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for ="product_price" class="form-label"> product price </label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <br/>

                <!--Insert product button-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert products">
            </div>
        </form>
    </div>
</body> 
</html>