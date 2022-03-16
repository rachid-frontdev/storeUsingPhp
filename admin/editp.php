<?php 
    include('../inc/connection.php');
  session_start();
    if( $_SESSION['admin'] == '') {
     header('Location:index.php');
    } 
$id = $_GET['id'];
$sql = "select * from products where id='$id'";
$ret = mysqli_query($connection, $sql);
while($res = mysqli_fetch_assoc($ret)) {
    $name = $res["product_name"];
    $desc = $res["description"];
    $price = $res["product_price"];
    $cat = $res["category"];
    $img = $res["img"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>edit product page </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            *{
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
                <nav class="navbar navbar-expand-lg navbar-light" >
  <div class="container">
    <a class="navbar-brand" href="adminindex.php"> storeByPhp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
        <div class="offcanvas offcanvas-end text-center " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">storeByPhp</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" href="adminindex.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addproduct.php">products</a>
          </li>
                      <li class="nav-item">
            <a class="nav-link" href="editp.php">edit</a>
          </li>
                <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
            <li class="nav-item" id="search">
             <a href="#">
                <i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
            <form action='' method="POST" style="text-align:center;" enctype="multipart/form-data">
    <input  class="form-control" type='text' name='pname' value='<?php echo $name ?>'>
        <input class="form-control"  type='text' name='pdescription' value='<?php echo $desc ?>'>
        <input class="form-control"  type='text' name='price' value='<?php echo $price ?>'>
                <br>
        <label for="cat">category</label>
        <select id="cat" name="category">
                <option value='<?php echo $cat ?>' selected><?php echo $cat ?></option>
                <option value='phones'>phones</option>
                <option value='samsung'>samsung</option>
                <option value='iphone'>iphone</option>
                <option value='huawei'>huawei</option>
                </select>
                <br>                <br>
                <br>

                <label>photo you are selected</label>
                <img style='width:200px;' src="../image/<?php echo $img ?>" alt="<?php echo $desc ?>">
                <br>   <br>                <br>
                <br>
    <input  type='file' name='img'>
    <input class="btn btn-danger" type="submit" name='edit' value='submit'>
    </form>
<?php 
  if(isset($_POST['edit'])) {
                  $name = $_POST['pname'];
            $desc = $_POST['pdescription'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            $image = $_FILES['img']['name'];
            $uploaddir = '../image/';
            $uploadFile= $uploaddir.basename($_FILES['img']['name']);
            if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)){
                if($image == '')
                    $sql = "update products set product_name = '$name', product_price = '$price', description = '$desc', category = '$cat', img = '$img' where id='$id'";
                else 
                    $sql = "update products set product_name = '$name', product_price = '$price', description = '$desc', category = '$cat', img = '$image' where id='$id'";
                $ret = mysqli_query($connection, $sql);
                if($ret) {
                    echo 'your product edited successfully!';
                    echo "<script>setTimeout(() => {
                        window.location.href = 'editp.php?id=".$id."';
                    },500)</script>";                    

                         } else {
                    echo 'you are having error';
                }             
            } else {
                if($image == '')
                    $sql = "update products set product_name = '$name', product_price = '$price', description = '$desc', category = '$cat', img = '$img' where id='$id'";
                else 
                    $sql = "update products set product_name = '$name', product_price = '$price', description = '$desc', category = '$cat', img = '$image' where id='$id'";
                $ret = mysqli_query($connection, $sql);
                if($ret) {
                    echo 'your product edited successfully!';
                    echo "<script>setTimeout(() => {
                        window.location.href = 'editp.php?id=".$id."';
                    },500)</script>";                    
                } 
        }
          mysqli_close($connection);

  }

        ?>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>