<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel='stylesheet' href="main.css">
        <style>
            .col-lg-4 img {
                width:200px;
                height:180px;
            }

        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <script src="https://use.fontawesome.com/fecf5a07d6.js"></script>

    </head>
<body >

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

        <?php 
include './inc/connection.php';
        session_start();

?>
<?php 
        include('parts/formavoidrepeat.php');

        ?>
    <div class="container">
        <div class="row no-gutters">
    <?php 
    $sql = "SELECT * FROM products";
    $ret = mysqli_query($connection, $sql);
    // عندما لا نعرف اي عدد النتائج لي راح تظهرلنا
    while($res = mysqli_fetch_assoc($ret)){
        echo '
        <div class="col col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card mt-4" style="width: 18rem;">
                    <center><img src="image/'.$res["img"].'" class="img-fluid card-img-top mt-3" alt=" '.$res["description"].'"></center>
                  <div class="card-body">
                    <h5 class="card-title">'.$res["product_name"].' </h5>
                    <p class="card-text">$ '.$res["product_price"].'</p>
                    <form action="" method="post">
                    <label for="qty">quantity</label>
                    <input id="qty" type="number" name="quantity">
                    <input type="hidden" name="product_name" value="'.$res["product_name"].'">
                    <input type="hidden" name="product_price" value="'.$res["product_price"].'">
                    <input type="hidden" name="cid" value="'.$res["id"].'">

                    
                    <br>
                    <input type="submit" name="buy" value="Buy It Now" class="btn btn-primary">
                    </form>
                  </div>
            </div>
            </div>';
    }

?>
            
        </div>
    </div>
    <?php 
            echo  $_SESSION['userId'];

    if(isset($_POST['buy'])) {
    if( $_SESSION['userId'] != '') {
        $userId = $_SESSION['userId'];
    } else {
  echo '<script>window.location.href = "login.php"</script>';
    }
     $cid = $_POST['cid'];
    $qty = $_POST['quantity'];
    $item_name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $sql = "insert into purchase_stock(item_cid,item_name,purchase_qty,purchase_price, usersId) values('$cid', '$item_name', '$qty', '$price', '$userId')";
       $ret = mysqli_query($connection, $sql);
        if($ret) {
            echo 'succed add to cart'. ' <script>window.location.href = "yourcart.php"</script>';
        } else {
            echo 'you have error ';
        }
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('Your_API_Publishable_Key');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>
            <script src="script.js"></script>
    <script>
                const array = window.location.pathname;
                document.title = array.split('/', 2)[1];
    </script>
    </body>
</html>
