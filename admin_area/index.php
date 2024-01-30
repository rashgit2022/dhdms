<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!--Boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
.admin_image{
    width: 100px;
    object-fit:contain:
}

    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/4k.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>                        
                        </li>
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
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="px-5">
                        <a href="#"> <img src="../images/2.png" alt="" class="admin_image"></a>
                        <p class="text-light text-center">Admin Name </p>

                    </div>
                    <div class="button text-center ">
                        <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Insert Items</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1">View products</a></button>
                        <button><a href="insert_categories.php" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
        
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Boostrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>
</html>
