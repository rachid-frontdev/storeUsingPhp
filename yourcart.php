<?php 
    include('./inc/connection.php');
$cid = $_GET['cid'];
$qty = $_POST['quantity'];
$item_name = $_POST['product_name'];
$price = $_POST['product_price'];

echo $cid. "<br>";
    echo $qty. "<br>";
//    $sql = "select * from products where id='$cid'";
        $sql = "insert into purchase_stock(item_cid,item_name,purchase_qty,purchase_price) values('$cid', '$item_name', '$qty', '$price')";
    $ret = mysqli_query($connection, $sql);
        if($ret) {
            echo 'succed add to cart';
        } else {
            echo 'you have error ';
        }


?>
<!--الربط بين العمليات على قاعدة البيانات -->
<!--SELECT a.id, a.product_name, a.product_price, b.purchase_qty, a.product_price * b.purchase_qty AS 'Total' FROM products AS a LEFT JOIN purchase_stock AS b ON a.id=b.item_cid;-->