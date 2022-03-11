<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>تعلم تصميم وتطوير مواقع الويب باحترافية | Udemy</title>
        <style>
            .col-lg-4 img {
                width:200px;
                height:180px;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body >
    <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./hea/test.php">test</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./logout.php">log out</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="filter.php">filter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>
        <?php 
include './inc/connection.php';
?>
<?php 
        include('parts/formavoidrepeat.php');

        ?>
    <div class="container">
        <div class="row">
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
    </body>
</html>
