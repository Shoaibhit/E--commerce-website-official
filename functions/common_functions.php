<?php

// include('./include/connect.php');

//getting product

function getproducts(){
    global $con;

    // check condition
    if(!isset($_GET['categorie'])){
    if(!isset($_GET['brand'])){
        $select_query="Select * from `products` order by rand() limit 0,3";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image' class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_discription</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
          }
}
}
}

// getting seprate products
function get_all_products(){
      global $con;

    // check condition
    if(!isset($_GET['categorie'])){
    if(!isset($_GET['brand'])){
        $select_query="Select * from `products` order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image' class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>
                  $product_discription
                </p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
          }
}
}

}
// getting unique categories
function get_uniqe_categorie(){
    global $con;


        if(isset($_GET['categorie'])){
            $categorie_id=$_GET['categorie'];
        $select_query="Select * from `products` where categorie_id=$categorie_id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
           echo "<h2 class='text-center text-danger'>
             No product is available for this category
             </h2>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image' class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>
                  $product_discription
                </p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
}
}
}
// getting unique brands
function get_uniqe_brand(){
    global $con;


        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
        $select_query="Select * from `products` where brand_id=$brand_id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
          echo "<h2 class='text-center text-danger'>
              No product is available for this category
              </h2>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image'class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>
                  $product_discription
                </p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
}
}
}





// displaying brand inside nav

function getbrands(){
     global $con;
        $select_brands="Select * from `brands`";
          $result_brands=mysqli_query($con,$select_brands);
          while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title=$row_data['brand_name'];
          $brand_id=$row_data['brand_id'];
          echo"<li class='nav-items'>
            <a href='index.php?brand=$brand_id'class='nav-link text-light'
          >$brand_title</a></li>"; }
}

function getcategories(){
     global $con;
    $select_categorie="Select * from `categories`";
          $result_categorie=mysqli_query($con,$select_categorie);
          while($row_data=mysqli_fetch_assoc($result_categorie)){
          $categorie_title=$row_data['categorie_name'];
          $categorie_id=$row_data['categorie_id'];echo "
          <li class='nav-items'>
            <a href='index.php?categorie=$categorie_id'class='nav-link text-light'>$categorie_title</a></li>"; }
}

// searching product 
function search_product(){
global $con;
if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
          $result_query=mysqli_query($con,$search_query);

           $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
           echo "<h2 class='text-center text-danger'>
             No product is available for this category
             </h2>";
          }
          
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image' class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>
                  $product_discription
                </p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
  }

}}

// view product details 

function viewdetails(){

    global $con;

    // check condition
    if(isset($_GET['product_id'])){
    if(!isset($_GET['categorie'])){
    if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];
        $select_query="Select * from `products` where product_id=$product_id";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_discription=$row['product_discription'];
            $product_image=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $categorie_id=$row['categorie_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin-area/product_images/$product_image' class='card-img-top' alt='$product_title' />
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>
                  $product_discription
                </p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='index.php' class='btn btn-secondary'>Go home</a>
              </div>
            </div>
          </div>
          <div class='col-md-8'>
                <!-- relatid cards -->
                 <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Relatid products</h4>
                    </div>
                    <div class='col-md-6'>
                     <img src='./admin-area/product_images/$product_image2' class='card-img-top' alt='$product_title' />
                    </div>
                    <div class='col-md-6'>
                      <img src='./admin-area/product_images/$product_image3' class='card-img-top' alt='$product_title' />
                    </div>
                 </div>
                 
            </div>";
          }
}
}
}
}

// get ip afdress 7
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//cart funtion

function add_cart(){
  if(isset($_GET['add_cart'])){
    global $con;
    $ip = getUserIpAddr();
    $get_id=$_GET['add_cart'];
    $select_query="Select * from `cart_details` where ip_adress='$ip' and product_id=$get_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows>0){
          echo "<script>alert('this item is already present inside cart')</script>";
          
          echo "<script>window.open('index.php','_self')</script>";

  }else{
    $insert_query="insert into `cart_details` (product_id,ip_adress,quantity) values ($get_id,'$ip',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('this item is added to cart')</script>";
     echo "<script>window.open('index.php','_self')</script>";
  }
  }
}

// function to get get cart number
function cart_function(){
    if(isset($_GET['add_cart'])){
    global $con;
    $ip = getUserIpAddr();
    $select_query="Select * from `cart_details` where ip_adress='$ip' ";
    $result_query=mysqli_query($con,$select_query);
    $num_cart_items=mysqli_num_rows($result_query);
         

  }else{
      global $con;
    $ip = getUserIpAddr();
    $select_query="Select * from `cart_details` where ip_adress='$ip' ";
    $result_query=mysqli_query($con,$select_query);
    $num_cart_items=mysqli_num_rows($result_query);
         
  }
  echo $num_cart_items;
  }

// function for getting full price 

function total_cart_price(){
    global $con;
    $ip = getUserIpAddr();
    $total=0;
    $cart_query="Select * from `cart_details` where ip_adress='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_product="Select * from `products` where product_id='$product_id'";
      $product_result=mysqli_query($con,$select_product);
      while($row_product_price=mysqli_fetch_array($product_result)){
        $product_price=array($row_product_price['product_price']);
        $product_value=array_sum($product_price);
        $total+=$product_value;
      }

    }
    echo $total;

}

?>