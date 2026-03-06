<?php
include('../include/connect.php');
include('../functions/common_functions.php');
@session_start();  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-login</title>
    <!-- bootstrap css -->
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username feild -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                   
                   
                     <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="mt-2 pt-2">
                        <input type="submit" value="login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="fw-bold small mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    global $con;
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $sql_query="select * from `user _table` where username='$user_username'";
    $result_querys=mysqli_query($con,$sql_query);
    $result=mysqli_num_rows($result_querys);
    $row_data=mysqli_fetch_assoc($result_querys);
    $user_ip=getUserIpAddr();

// cart details
$sql_query_cart="select * from `cart_details` where ip_adress='$user_ip'";
$select_cart=mysqli_query($con,$sql_query_cart);
$row_cart=mysqli_num_rows($select_cart);



    if($result>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
        //    echo "<script>alert('login sucessful')</script>";
        if($result==1 and $row_cart==0){
            $_SESSION['username']=$user_username;
           echo "<script>alert('login sucessful')</script>";  
           echo "<script>window.open('profile.php','_self')</script>";  
        }else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('login sucessful')</script>";  
           echo "<script>window.open('payment.php','_self')</script>"; 
        }
        }else{
          echo "<script>alert('ivalid login')</script>";  
        }
    }else{
      echo "<script>alert('ivalid login')</script>";
    }
}

?>