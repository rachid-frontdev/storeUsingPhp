<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>register page </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body class="container">
    <form action='' method="POST" style="text-align:center;">
    <input  class="form-control" type='text' name='fullname' placeholder='YOUR name'>
        <input class="form-control"  type='text' name='username' placeholder='YOUR username'>
        <input class="form-control"  type='email' name='email' placeholder='YOUR email'>    
    <input class="form-control"  type='password' name='password' placeholder='YOUR password'>
    <input class="form-control"  type='password' name='password2' placeholder='CONFIRM password'>


    <input class="btn btn-info" type="submit" name='click' value='submit'>
    </form>
            <?php 
    include('./inc/connection.php');
    if(isset($_POST['click'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];
//    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//     echo  $name . ' email ' . $email . ' password ' . $hashed_password;
            if($pass1 == $pass2) {
    $sql = "INSERT into users(fullname, email,username,password) values('$fullname','$email', '$username', '$pass1')";
    $ret = mysqli_query($connection, $sql);
        if($ret) {
            echo '<p>signup successful!</p>';
        } else {
         echo '<p>refused!, you can\'t signup </p>';   
        }
    
} else {
         echo '<p style="color:red;">repeat confirm  your pass </p>';   
    }
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>

