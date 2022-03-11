        <?php 
include('inc/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>filter by category</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .col-lg-4 img {
                width:200px;
                height:180px;
            }
    </style>
    </head>
    <body>
        <div class="container">
<?php 
        include('parts/formavoidrepeat.php');
        ?>
        <div class="row">
            <?php 
$category = $_GET['category'];
            $sql = "SELECT * FROM products where category='$category'";
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
                    <form action="yourcart.php?cid='.$res["id"].'" method="post">
                    <label for="qty">quantity</label>
                    <input id="qty" type="number" name="quantity">
                    <input type="hidden" name="product_name" value="'.$res["product_name"].'">
                    <input type="hidden" name="product_price" value="'.$res["product_price"].'">

                    
                    <br>
                    <input type="submit" value="Buy It Now" class="btn btn-primary">
                    </form>
                  </div>
            </div>
            </div>';
    } 
?>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html> 
