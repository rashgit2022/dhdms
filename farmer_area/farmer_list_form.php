<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer product listing Form</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Jquery file -->
    <script src="../js/jquery3.7.1.js"></script>
    
    <style>
        .img-nav{
          width:7%;
          height:75%;
          
        }
      </style>
  
</head>
<body>
 <!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
<img src="../images/logo.png" alt="" class="img-nav"/>
    <div>
        <h3 class="text-center">Welcome to product listing</h3>
        <p class="text-center"><b>When adding a product to sell at DHDMS, We encourage you to provide as many details as possible.For the buyer to have sufficient information to make an informed decision.</b></p>
    </div>
    
</nav>
<div class="container-fluid m-5">
        <h2 class="text-center mb-7">Farmer Product List form</h2>
        
        
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/farmer.png" alt="farmer_list_form" class="img-fluid">
            </div>
            
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" >
                    <!-- farmer product name field -->
                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Product Name</label>
                        <input type="text" id="farmer_product" name="farmer_item" 
                        placeholder="Enter your product name" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Category</label>
                        <br/>
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select a category</option>
                        <option value="">Vegetables</option>
                        <option value="">Fruits</option>
                    </select>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="formFileMultiple" class="form-label">Photos</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple required="required">
                      </div>

                      
                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Location</label>
                        <input type="text" id="location" name="farmer_location" 
                        placeholder="Enter your Location" autocomplete="off" required="required" 
                        class="form-control">
                    </div>
  
               
                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Unit price (1KG)</label>
                        <input type="number" step=".25" min="0.00" max="9999.75" id="p_unit_price" name="farmer_unit_price" 
                        placeholder="Enter your unit price (Rs.)" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Available date</label>
                        <input type="date" id="farmer_avail_date" name="farmer_available_date" 
                        placeholder="Enter your date" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Description</label>
                        <input type="text" id="farmer_description" name="farmer_description" 
                        placeholder="Type Here....." autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="farmer" class="form-label">Product Quantity</label>
                        <input type="number" min="0" max="100000" id="farmer_order_size" name="farmer_order_size" 
                        placeholder="Enter Max order size (KG)" autocomplete="off" required="required" 
                        class="form-control"/>
                    </div>
                    
                    <!-- submit  -->
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="form-submit" value="All done, Sell it!">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>



