<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>search </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/fecf5a07d6.js"></script>
        <link rel='stylesheet' href="main.css">
    </head>
    <body style="position:relative;">

<header class="bannerContainer mb-5" >
 
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
    

                <div class="container-fluid">

            <?php 
                    include './inc/connection.php';
            $search = $_GET['search'];
    $sql = "select * from products where product_name ='$search'";
    $ret = mysqli_query($connection, $sql);
    while($res = mysqli_fetch_assoc($ret)){
            var_dump($res);
        }

        ?>
    
    

    </div>
           <button id='upScroll' type="button" style="    position: absolute;
    right: 10px;
    bottom: 10px;
    border: none;
    background: red;
    color: #fff;
    font-size: 1.2em;
    border-radius: 1em;
    width: 100px;
    line-height: 34px;"><i class="fa-solid fa-angle-up"></i>up</button>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>