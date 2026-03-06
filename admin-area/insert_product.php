<?php

include('../include/connect.php');

if(isset($_POST['insert_product'])){

    $product_title = $_POST['product_title'];
    $discription = $_POST['discription'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_price = $_POST['product_price'];
    $product_brands = $_POST['product_brands'];
    $product_status = 'true';

    // CLEAN IMAGE NAMES (trim + space remove + unique)
    $product_image1 =$_FILES['product_image1']['name'];
    $product_image2 =$_FILES['product_image2']['name'];
    $product_image3 =$_FILES['product_image3']['name'];

    // temp names
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty
    if($product_title=='' || $discription=='' || $product_keywords=='' ||
       $product_categories=='' || $product_price=='' || $product_brands==''){
        
        echo "<script>alert('All fields required')</script>";
        exit();
    }

    // move images
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    // insert product (NO SPACE BEFORE VARIABLES)
    $insert_product = "INSERT INTO `products`
    (product_title,product_discription,product_keywords,categorie_id,brand_id,
    product_image1,product_image2,product_image3,product_price,date,status)
    VALUES
    ('$product_title','$discription','$product_keywords','$product_categories',
    '$product_brands','$product_image1','$product_image2','$product_image3',
    '$product_price',NOW(),'$product_status')";

    $result_query = mysqli_query($con,$insert_product);

    if($result_query){

        //  REDIRECT — Prevent Refresh Duplicate
        header("Location: insert_product.php?success=1");
        exit();
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product</title>
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="admin.css">
</head>
<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert products</h1>
        <form action="" method="post"enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">
                    Product title
                </label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="enter the product title" autocomplete="off" required="required">
            </div>
            <!-- discription -->
            <div class="form-outline mb-4 w-auto">
                <label for="discription" class="form-label">
                    Product discription
                </label>
                <input type="text" name="discription" id="discription" class="form-control" placeholder="enter the Product discription" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-auto">
                <label for="product_keywords" class="form-label">
                    Product_keywords
                </label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="enter the product keywords" autocomplete="off" required="required">
            </div>
            <!-- categories -->
             <div class="form-outline mb-4 w-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">select a categorie</option>
                    <?php
                     $select_query="Select * from `categories`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $categorie_title=$row['categorie_name'];
                        $categorie_id=$row['categorie_id'];
                        echo "<option value='$categorie_id'>$categorie_title</option>";

                     };
                    ?>
                  
                </select>
             </div>
            <!-- brands -->
             <div class="form-outline mb-4 w-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">select a Brands</option>
                      <?php
                     $select_query="Select * from `brands`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_name'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";

                     };
                    ?>
                </select>
             </div>

             <!-- image1 -->
               <div class="form-outline mb-4 w-auto">
                <label for="product_image1" class="form-label">
                    Product image1
                </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
             <!-- image2 -->
               <div class="form-outline mb-4 w-auto">
                <label for="product_image2" class="form-label">
                    Product image2
                </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
             <!-- image3 -->
               <div class="form-outline mb-4 w-auto">
                <label for="product_image3" class="form-label">
                    Product image3
                </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
             <!-- price -->
            <div class="form-outline mb-4 w-auto">
                <label for="product_price" class="form-label">
                    Product_price
                </label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="enter the product_price" autocomplete="off" required="required">
            </div>
             <!-- button -->
            <div class="form-outline mb-4 w-auto mb-3 px-3">
           <input type="submit" name="insert_product" class="btn btn-info" value="insert products">
            </div>
        </form>
    </div>
    
</body>
</html>