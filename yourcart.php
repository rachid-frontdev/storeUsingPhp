<?php 
    include('./inc/connection.php');
        session_start();
        if($_SESSION['userId'] != "") {
            $userId = $_SESSION['userId'];
        } else header('Location:login.php')
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>your cart </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/fecf5a07d6.js"></script>
        <link rel='stylesheet' href="main.css">
    </head>
    <body>

<header class="bannerContainer" >
 
<div id="carouselExampleSlidesOnly" class="carousel  slide"  data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="1000">
      <img src="./work.jpg" class="d-block w-100" alt="work">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./pexels-otavio-fonseca.jpg" class="d-block w-100" alt="work2">
    </div>
  </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>
        </header>
               <nav class="navbar navbar-expand-lg navbar-light fixed-top" >
  <div class="container">
    <a class="navbar-brand" href="index.php"> storeByPhp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
        <div class="offcanvas offcanvas-end text-center " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">storeByPhp</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addproduct.php">products</a>
          </li>
                      <li class="nav-item">
            <a class="nav-link" href="contact.php">contact</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="quote.php">quote</a>
          </li>
                        <li class="nav-item">
            <a class="nav-link" href="courses.php">courses</a>
          </li>
                        <li class="nav-item">
            <a class="nav-link" href="about.php">about</a>
          </li>
            <li class="nav-item" id="search">
             <a href="#">
                <i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    
        <div class='form_show'>
            <span id="close_btn">×</span>
                <form id="inOverlay" method="get" action="blog-search.php" class="d-flex flex-row">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-info" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
</button>
        </form>
        </div>

                <div class="container">
                <h4 class="title">items in your cart</h4>
        <table class="table table_dark  table-bordered border-rounded">
        <thead>
        <th scope="col">item_cid</th>
        <th scope="col">item_name</th>
        <th scope="col">purchase_qty</th>
        <th scope="col">purchase_price</th>
        <th scope="col">Total</th>

        </thead>
            <tbody>
            <?php 
    $sql = "select item_cid,item_name,purchase_qty,purchase_price, purchase_qty * purchase_price as 'Total'  from purchase_stock where usersId ='$userId'";
    $ret = mysqli_query($connection, $sql);
    while($res = mysqli_fetch_assoc($ret)){
        echo ' <tr>
            <td>'.$res["item_cid"].'</td>
            <td>'.$res["item_name"].'</td>
            <td>'.$res["purchase_qty"].'</td>
            <td>'.$res["purchase_price"].'</td>
            <td>'.$res["Total"].'</td>
        </tr>';
        }
        echo "<div class='alert alert-warning'>No Item In Cart!</div>";

        ?>
            </tbody>
        </table>
    

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>
<!--الربط بين العمليات على قاعدة البيانات -->
<!--SELECT a.id, a.product_name, a.product_price, b.purchase_qty, a.product_price * b.purchase_qty AS 'Total' FROM products AS a LEFT JOIN purchase_stock AS b ON a.id=b.item_cid;--
avg() as 'average'
>
