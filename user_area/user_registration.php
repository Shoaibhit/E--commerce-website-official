<?php
include('../include/connect.php');
include('../functions/common_functions.php');  


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-registration</title>
    <!-- bootstrap css -->
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username feild -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email feild -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                     <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                     <!-- conf user password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!-- adress feild -->
                    <div class="form-outline mb-4">
                        <label for="user_adress" class="form-label">Address</label>
                        <input type="text" id="user_adress" class="form-control" placeholder="Enter your adress" autocomplete="off" required="required" name="user_adress">
                    </div>
                    <!-- contact feild -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="mt-2 pt-2">
                        <input type="submit" value="register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="fw-bold small mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>




<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $password_hash=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_adress=$_POST['user_adress'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getUserIpAddr();

    // select query
    $select_query="select * from `user _table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('user already exist')</script>"; 
    }else if($user_password!=$conf_user_password){
      echo "<script>alert('password do  not match')</script>"; 
    }
    else{
            // insert query
    move_uploaded_file($user_image_tmp ,"./user_image/$user_image");
    $insert_query="insert into `user _table` (username,user_email,user_password,user_image,user_ip,user_adress,user_mobile) values ('$user_username','$user_email','$password_hash','$user_image','$user_ip','$user_adress','$user_contact')";
    $result_execute=mysqli_query($con,$insert_query);
    }

      //   select cat items

      $select_cart_items="select * from `cart_details` where ip_adress='$user_ip'";
      $result_cart=mysqli_query($con,$select_cart_items);
      $count_rows=mysqli_num_rows($result_cart);
      if($count_rows>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have some items in cart')</script>"; 
        echo "<script>window.open('checkout.php','_self')</script>"; 
      }else{
        echo "<script>window.open('../index.php','_self')</script>"; 
      }


}

?>