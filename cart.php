<?php

include('include/connect.php');
include('functions/common_functions.php');
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />

    <!-- font awosome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit:contain;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid p-0">
          <img src="logo.png" alt="" class="logo" />
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user_area/user_registration.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"
                  ><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_function(); ?></sup></a
                >
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- calling cart funtion -->
   <?php
    add_cart();
   ?>
    <!-- cotations -->

    <!-- 2nd child  -->
    <nav class="navbar navbar-expand lg-m-auto navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Wellcome guest</a>
        </li>
       <?php
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_login.php'>login</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>logout</a>
        </li>";
        }
        ?>
      </ul>
    </nav>
    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden store</h3>
      <p class="text-center">
        Comunication is at the heat of e-commerce and comunity
      </p>
    </div>

<!-- forth child -->
 <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            <tbody>
                <!-- php code -->
                 <?php
            $ip = getUserIpAddr();
    $total=0;
    $cart_query="Select * from `cart_details` where ip_adress='$ip'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
   
    if($result_count>0){
      echo"<thead>
                <tr>
                    <th>Product title</th>
                    <th>Product image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>";
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_product="Select * from `products` where product_id='$product_id'";
      $product_result=mysqli_query($con,$select_product);
      while($row_product_price=mysqli_fetch_array($product_result)){
        $product_price=array($row_product_price['product_price']);
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image1=$row_product_price['product_image1'];
        $product_value=array_sum($product_price);
        $total+=$product_value;


?>
                <tr>
                    <td><?php echo $product_title  ?></td>
                    <td><img src="./admin-area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" class="form-input w-50" name="qty"></td>
                    <?php
                   $ip_add = getUserIpAddr();
                   if(isset($_POST['update_cart'])){
                    $qunatities=$_POST['qty'];
                    $update_cart="update `cart_details` set quantity=$qunatities where ip_adress='$ip_add' ";
                    $result_quantity=mysqli_query($con,$update_cart);
                    $total=$total*$qunatities;
                   }

                   ?>
                    <td><?php echo $price_table  ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id   ?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-2">Update</button> -->
                         <input type="submit" value="update cart" class="bg-info px-3 py-2 border-0 mx-2" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-2">Remove</button> -->
                        <input type="submit" value="remove cart" class=" bg-info px-3 py-2 border-0 mx-2" name="remove_cart">

                    </td>
                </tr>
                <?php
                      }}}
    else{
      echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
    }
    ?>
            </tbody>
        </table>
        <!-- subtotal -->
         <div class="d-flex mb-5">
          <?php
           $ip = getUserIpAddr();
    $cart_query="Select * from `cart_details` where ip_adress='$ip'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
     echo "  <h4 class='px-3'>Subtotal:<strong class='text-info'> $total/-</strong></h4>
            <input type='submit' value='continue shopping' class='bg-info px-3 py-2 border-0 mx-2' name='continue shopping'>
            <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout </a></button>";
    }else{
      echo "<input type='submit' value='continue shopping' class='bg-info px-3 py-2 border-0 mx-2' name='continue_shopping'>";
    }
    
    if(isset($_POST['continue_shopping'])){
      echo "<script>window.open('index.php','_self')</script>";
    }


          ?>
          
         </div>
    </div>
 </div>
 </form>

 <!-- funtion to remove items -->
  <?php
  function remove_cart(){ 
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id ;
        $delete_query="delete from `cart_details` where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  }
echo $remove_item=remove_cart();




 ?>






    <!-- last child -->
   <!-- include footer -->
    <?php
    include("./include/footer.php");
    ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
