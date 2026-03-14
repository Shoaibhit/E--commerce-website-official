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
                <a class="nav-link" href="#">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"
                  ><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_function(); ?></sup></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Total Price: <?php total_cart_price();?> /-</a>
              </li>
            </ul>
            <form class="d-flex me-2" action="search_pro.php" method="get">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
                name="search_data"
              />
              <input type="submit" value ="search" class="btn btn-outline-light" name="search_data_product">
            </form>
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
<?php
  if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>Wellcome guest</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " . $_SESSION['username']."</a>
        </li>";
        }
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

     <!-- fourth child  -->
    <div class="row px-1">
      <div class="col-md-10">
        <div class="row ">

            
          <?php
 viewdetails();
 get_uniqe_categorie();
 get_uniqe_brand();
          ?>

        </div>
      </div>

      <div class="col-md-2 bg-secondary p-0">
        <!-- brands -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-items">
            <a href="#" class="nav-link text-light bg-info"
              ><h4>Delivery Brands</h4></a>
          </li>
          <?php
getbrands(); 
          ?>
        </ul>
        <!-- categories -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-items">
            <a href="#" class="nav-link text-light bg-info"
              ><h4>Categories</h4></a
            >
          </li>

          <?php 
          getcategories();
          
          ?>
        </ul>
      </div>
    </div>
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
