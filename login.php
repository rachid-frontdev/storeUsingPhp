<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>تعلم تصميم وتطوير مواقع الويب باحترافية | Udemy</title>
    </head>
<body>
        <?php 
    include('./inc/connection.php'); 
?>
<form action='' method="POST" style="display:flex;flex-direction:column;">
    <input type='text' name='username' placeholder='YOUR username'>
    <input type='password' name='password' placeholder='YOUR password'>
    <input type="submit" name='login' value='submit'>
    </form>
            <?php 
if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
//if(password_verify($password, $existingHashFromDb)) {
//    echo 'Password is Correct';
//}
    $sql = "select fullname from users where username='$username' and '$password'";
    $ret = mysqli_query($connection,$sql);
    while($res = mysqli_fetch_assoc($ret)){
            session_start();
    $_SESSION['user'] = $res['fullname'];
    echo "<script>window.location.href = 'index.php'</script>";
    }
}
?>

    </body>
</html>