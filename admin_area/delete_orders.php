<?php
if(isset($_GET['delete_orders'])){
    $delete_orders=$_GET['delete_orders'];
    //echo $delete_orders;

    $delete_query="Delete from `user_orders` where order_id=$delete_orders";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('order is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}
?>