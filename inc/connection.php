<?php 
//$connection = mysqli_connect("localhost","root","","basefirst");
$port =3306;
$connection = mysqli_connect("sql11.freesqldatabase.com","sql11479518","3b8b1Mtxe6","sql11479518", $port);
//$Host: sql11.freesqldatabase.com
//$Database name: sql11479518
//Database user: sql11479518
//Database password: 3b8b1Mtxe6


if(!$connection) {
    echo 'db failed to match!';
}
?>
