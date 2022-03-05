<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>تعلم تصميم وتطوير مواقع الويب باحترافية | Udemy</title>
    </head>
<body>
        <?php 
//include './hea/test.php';
    session_start();
    if( $_SESSION['user'] != '') {
        $user = $_SESSION['user'];
$sql = "SELECT Fullname from users where username='$user'";
//    $ret = mysqli_query($connection, $sql);
//        while($res = mysqli_fetch_assoc($ret)){
//            $fullname= $res['Fullname'];
//    }

    } else header("Location:login.php")
?>
    <h2>hello <?php echo $user?> </h2>
<form action='' method="POST" style="display:flex;flex-direction:column;">
    <input type='text' name='name' placeholder='YOUR name'>
        <input type='email' name='email' placeholder='YOUR email'>
    <input type='password' name='password' placeholder='YOUR password'>

    <input type="submit" name='click' value='submit'>
    </form>
            <?php 
    $j=1;
    while($j<10){
        echo $j. '<br>';
        if($j ==5) {
            break;
        }
        $j+=1;
    }

    if(isset($_POST['click'])) {
    $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     echo  $name . ' email ' . $email . ' password ' . $hashed_password;
}
?>
<form action='display.php' method="post">
        <input type='text' name='name' placeholder='YOUR name'>
    <input type="submit" name='submit' value='submit'>

    </form>
        <a href='./hea/test.php'>test page</a>
        <a href='./logout.php'>logout</a>

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
