<?php
include('../include/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}


// getting total item and price of product

$get_ip_adress=getUserIpAddr();
$total_price=0;
$cart_query_price="select * from `cart_details` where ip_adress='$get_ip_adress'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$count_product=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $cart_product="select * from `products` where product_id=$product_id";
    $run_price=mysqli_query($con, $cart_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;

    }
}

?>