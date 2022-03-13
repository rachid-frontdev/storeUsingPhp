<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>login </title>
    </head>
<body>
        <?php 
    include('./inc/connection.php'); 
?>
<form action='' method="POST" >
    <input type='text' name='username' placeholder='YOUR username'>
    <input type='password' name='password' placeholder='YOUR password'>
    <input type="submit" name='login' value='submit'>
    </form>
            <?php 
if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
//    $sql = "select fullname from users where username='$username' and password='$password'";
        $sql = "select id, fullname from users where username='$username' and password='$password'";
    $ret = mysqli_query($connection,$sql);
    while($res = mysqli_fetch_assoc($ret)){
        session_start();
        $_SESSION['userId'] = $res['id'];
        $_SESSION['user'] = $res['fullname'];
        echo  $_SESSION['userId'];
  echo '<script>window.location.href = "index.php"</script>';
    }
    echo '<center><h5> you\'re miss something??</h5></center>';
}
?>

    </body>
</html>