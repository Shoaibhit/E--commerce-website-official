<?php

if(isset($_GET['edit_products'])){
  $edit_id=$_GET['edit_products'];
  $get_data="select * from `products` where product_id=$edit_id";
  $result=mysqli_query($con,$get_data);
  $row=mysqli_fetch_assoc($result);
  $product_title=$row['product_title'];
  $product_discription=$row['product_discription'];
  $product_keywords=$row['product_keywords'];
  $categorie_id=$row['categorie_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $product_price=$row['product_price'];

  //fetch categorie name 
  $select_brands="select * from `brands` where brand_id=$brand_id";
   $result_brands=mysqli_query($con,$select_brands);
   $row_brands=mysqli_fetch_assoc($result_brands);
   $brand_title=$row_brands['brand_name'];


  //fetch brand name 
  $select_categorie="select * from `categories` where categorie_id=$categorie_id";
   $result_categorie=mysqli_query($con,$select_categorie);
   $row_categorie=mysqli_fetch_assoc($result_categorie);
   $categorie_title=$row_categorie['categorie_name'];
  
}
?>



<div class="container mt-5">
    <h1 class="text-center">Edit products</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline w-50 m-auto mb-3">
          <label for="product_title" class="form-label">Product Title</label>
          <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control"
          required="required">
      </div>
      <div class="form-outline w-50 m-auto mb-3">
          <label for="product_desc" class="form-label">Product Description</label>
          <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_discription ?>" class="form-control"
          required="required">
      </div>
      <div class="form-outline w-50 m-auto mb-3">
          <label for="product_keywords" class="form-label">Product Keywords</label>
          <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>"name="product_keywords" class="form-control"
          required="required">
      </div>
      <div class="form-outline w-50 m-auto mb-3">
         <label for="product_keywords" class="form-label">Product categorie</label>
          <select name="product_categorie" class="form-select" >
            <option value="<?php echo $categorie_title ?>"><?php echo $categorie_title ?></option>
            <?php
  $select_categorie_all="select * from `categories`";
   $result_categorie_all=mysqli_query($con,$select_categorie_all);
   while($row_categorie_all=mysqli_fetch_assoc($result_categorie_all)){
    $categorie_title=$row_categorie_all['categorie_name'];
    $categorie_id=$row_categorie_all['categorie_id'];
            
    echo "<option value='$categorie_id'>$categorie_title</option>";
   };


?>
          </select>
      </div>
      <div class="form-outline w-50 m-auto mb-3">
         <label for="product_keywords" class="form-label">Product brands</label>
          <select name="product_brands" class="form-select">
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
 <?php
  $select_brand_all="select * from `brands`";
   $result_brand_all=mysqli_query($con,$select_brand_all);
   while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
    $brand_title=$row_brand_all['brand_name'];
    $brand_id=$row_brand_all['brand_id'];
            
    echo "<option value='$brand_id'>$brand_title</option>";
   };


?>
          </select>
      </div>
       <div class="form-outline w-50 m-auto mb-3">
          <label for="product_desc" class="form-label">Product image1</label>
          <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto"
          required="required">
          <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_image">
          </div>
      </div>
       <div class="form-outline w-50 m-auto mb-3">
          <label for="product_desc" class="form-label">Product image2</label>
          <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
          required="required">
          <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_image">
          </div>
      </div>
       <div class="form-outline w-50 m-auto mb-3">
          <label for="product_desc" class="form-label">Product image3</label>
          <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
          required="required">
          <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_image">
          </div>
      </div>
      <div class="form-outline w-50 m-auto mb-3">
          <label for="product_price" class="form-label">Product price</label>
          <input type="text" id="product_price"value="<?php echo $product_price ?>" name="product_price" class="form-control"
          required="required">
      </div>
      <div class="w-50 m-auto ">
        <input type="submit" name="edit_product" value="update product" class="btn btn-info px-3 mb-3">
      </div>
    </form>
</div>

<!-- editing product -->
 <?php
 if(isset($_POST['edit_product'])){
  $edit_id=$_GET['edit_products'];
 $product_title=$_POST['product_title'];
 $product_desc=$_POST['product_desc'];
 $product_keywords=$_POST['product_keywords'];
 $product_categorie=$_POST['product_categorie'];
$product_brand=$_POST['product_brands'];
 $product_price=$_POST['product_price'];


 $product_image1=$_FILES['product_image1']['name'];
 $product_image2=$_FILES['product_image2']['name'];
 $product_image3=$_FILES['product_image3']['name'];


 $temp_image1=$_FILES['product_image1']['tmp_name'];
 $temp_image2=$_FILES['product_image2']['tmp_name'];
 $temp_image3=$_FILES['product_image3']['tmp_name'];

 if($product_title=='' or $product_price==''){
  echo"<script>alert('please fill all the feilds')</script>";
 }else{
  move_uploaded_file($temp_image1,"./product_images/$product_image1");
  move_uploaded_file($temp_image2,"./product_images/$product_image2");
  move_uploaded_file($temp_image3,"./product_images/$product_image3");

$update_products="update `products` set product_title='$product_title',product_discription='$product_desc',product_keywords='$product_keywords',categorie_id='$product_categorie',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id"; 
$result_update=mysqli_query($con,$update_products);
if($result_update){
 echo"<script>alert('product updated sucessfuly')</script>";
 echo"<script>window.open('./insert_product.php','_self')</script>";
}
 }
 }
?>

