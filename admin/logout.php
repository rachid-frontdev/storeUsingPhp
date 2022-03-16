<?php 
session_start();
$_SESSION['admin']= '';
session_destroy();
echo '<script>window.location.href = "./index.php"</script>';
?>
