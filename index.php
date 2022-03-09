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
        <?php 
include './inc/connection.php';
    session_start();
    if( $_SESSION['user'] != '') {
        $user = $_SESSION['user'];
    } else header("Location:login.php")
?>
    <h1><?php echo 'hello '. $user ?></h1>
<form action='display.php' method="post">
        <input type='text' name='name' placeholder='YOUR name'>
    <input type="submit" name='submit' value='submit'>

    </form>
    <div class="container">
        <div class="row">
    <?php 
    $sql = "SELECT * FROM products";
    $ret = mysqli_query($connection, $sql);
    // عندما لا نعرف اي عدد النتائج لي راح تظهرلنا
    while($res = mysqli_fetch_assoc($ret)){
        echo '
        <div class="col col-lg-4 col-md-4">
            <div class="card" style="width: 18rem;">
                    <img src="image/'.$res["img"].'" class="img-fluid card-img-top" alt=" '.$res["description"].'">
                  <div class="card-body">
                    <h5 class="card-title">'.$res["product_name"].' </h5>
                    <p class="card-text">$ '.$res["product_price"].'</p>
                    <a href="#" class="btn btn-primary">Buy It Now</a>
                  </div>
            </div>
            </div>';
//    $_SESSION['user'] = $res['fullname'];
    }
?>

        </div>

    </div>
    

        <a href='./hea/test.php'>test page</a>
        <a href='./logout.php'>logout</a>
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
