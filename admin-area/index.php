<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin pannel</title>
    <!-- bootstrap -->
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
    <style>
        .img1{
          height: 50px;
          object-fit:contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info navbar-light">
            <div class="container-fluid">
                <img src="adlogo.jpg" alt="" class="logoc">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-items">Wellcome guest</li>
                    </ul>
                </nav>
            </div>
        </nav>
     <!-- 2nd chilld -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
                <div class="p-3">
                    <a href="#"><img src="adlogo.jpg" alt="" class="img1"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="buttton text-center ms-5 " >
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brand</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brand</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>

        </div>
    </div>
     <!-- 3rd Child -->

     <div class="container my-3">
        <?php
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brand.php');
        }

        ?>
     </div>


 <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
    
</body>
</html>