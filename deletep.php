<?php 
    include('./inc/connection.php');
$id = (int)$_GET['id'];
    $sql = "delete from products where id = '$id'";
    $ret = mysqli_query($connection, $sql);
    if($ret) {        
        header('Location:index.php');
    } else {
        echo 'you can\'t remove item.';
    } 



?>