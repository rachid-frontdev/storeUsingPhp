<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/fecf5a07d6.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </head>
<body>
        <?php 
    include('./inc/connection.php'); 
?>
<form action='' name="login" method="POST" >
    <input type='text' name='username' placeholder='YOUR username'>
    <input type='password' name='password' placeholder='YOUR password'>
    <input type="submit" name='login' value='submit'>
    </form>
            <?php 
if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    if(empty($username) && empty($password)) {
        echo '<div  class="alert alert-warning mt-5 error">username or password is incorrect</div>';
    }
//    $sql = "select fullname from users where username='$username' and password='$password'";
        $sql = "select id, fullname from users where username='$username' and password='$password'";
    $ret = mysqli_query($connection,$sql);
        if(mysqli_num_rows($ret) > 0) {
            while($res = mysqli_fetch_assoc($ret)){
        session_start();
        $_SESSION['userId'] = $res['id'];
        $_SESSION['user'] = $res['fullname'];
        echo  $_SESSION['userId'];
  echo '<script>window.location.href = "index.php"</script>';
    } 
  } 
    else
          echo '<div  class="alert alert-warning mt-5 error">something get wrong</div>';
            

mysqli_close($connection);
}
?>
<script>
    let error =document.querySelector('.error');
    let userInput =  document.querySelectorAll(`form[name="login"] input`);
    userInput.forEach((input) => {
        input.onfocus = () => {
            if(error) error.style.display = 'none';                
            
        }
    })
    </script>
    </body>
</html>
