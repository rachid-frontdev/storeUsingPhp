<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="this is where">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    </head>
    <body>
    
    <a href='../logout.php'>logout</a>
        <?php 
session_start();
if ($_SESSION['user'] != '') {
    echo $_SESSION['user'];
} else header("Location:../login.php");
function calc($num1) {
    return $num1* $num1;
}
function display($one, $two) {
    return $one. ' i think '. ',' .$two;
}
?>

    </body>
</html>