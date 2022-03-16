        <?php 
include '../inc/connection.php';
        session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>adminLogin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
<body>

    <a class="navbar-brand" href="index.php"> storeByPhp</a>
    

            <form action='' method="POST" >
    <input type='text' name='username' placeholder='YOUR username'>
    <input type='password' name='pass' placeholder='YOUR password'>
        <p>you can't share this information</p>
    <input type="submit" name='loginAdmin' value='submit'>
    </form>

    <?php 
        if(isset($_POST['loginAdmin'])) {
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM admins where username='$user' and pass='$pass'";
    $ret = mysqli_query($connection, $sql);
        if(mysqli_num_rows($ret) > 0) {
    while($res = mysqli_fetch_assoc($ret)){
        $_SESSION['admin'] = 1;
        header('Location:adminindex.php');

    }}
            else {
                echo 'you can\'t access';
            }
    mysqli_close($connection);
        }
   
?>
            
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    </body>
</html>
