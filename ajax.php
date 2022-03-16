<?php 
include('inc/connection.php');

//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $sql = "SELECT  product_name  FROM products WHERE product_name LIKE '%$Name%' LIMIT 5";
//Query execution
    $ret = mysqli_query($connection,$sql);
       //Fetching result from database.
    
   while ($res = mysqli_fetch_assoc($ret)) {
      echo "<li onclick='fill('".$res['product_name']."')'>
   <a>
    ".$res['product_name']."
       </a>
   </li>";
   }

}
       ?>
