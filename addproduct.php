<?php 
    include('./inc/connection.php');
  session_start();
    if( $_SESSION['user'] != '') {
        $user = $_SESSION['user'];
    } else header("Location:login.php")

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>add product page </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            *{
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
            <h1><?php echo 'hello '. $user ?></h1>
            <form action='' method="POST" style="text-align:center;" enctype="multipart/form-data">
    <input  class="form-control" type='text' name='pname' placeholder='name of product'>
        <input class="form-control"  type='text' name='pdescription' placeholder='Description'>
        <input class="form-control"  type='text' name='price' placeholder='price'>
                <br>
        <label for="cat">category</label>
        <select id="cat" name="category">
                <option value='phones'>phones</option>
                <option value='samsung'>samsung</option>
                <option value='iphone'>iphone</option>
                <option value='huawei'>huawei</option>
                </select>
                <br>
    <input  type='file' name='img'>
    <input class="btn btn-danger" type="submit" name='add' value='submit'>
    </form>
<?php 
  if(isset($_POST['add'])) {
            $uploaddir = 'image/';
            $uploadFile= $uploaddir.basename($_FILES['img']['name']);
            if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)){
            $name = $_POST['pname'];
            $desc = $_POST['pdescription'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            $image = $_FILES['img']['name'];
                $sql = "insert into products(product_name, product_price, description,category, img) values('$name', '$price', '$desc', '$cat','$image')";
                $ret = mysqli_query($connection, $sql);
                if($ret) {echo 'your product added success!';
                         } else {
                    echo 'you are having error';
                }
                
            }
        }

        ?>
        <h2>for delete select product</h2>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">#</th>
            <th scope="col">#edit</th>
                
            </tr>
            </thead>
            <tbody>
            <?php 
                $sql = "select * from products";
                $ret = mysqli_query($connection, $sql);
                while($res = mysqli_fetch_assoc($ret)) {
                    echo '<tr>
                <td>'.$res['id'].'</td>
                <td>'.$res['product_name'].'</td>
                <td>'.$res['product_price'].'</td>
                <td>'.$res['description'].'</td>
                <td>'.$res['category'].'</td>
                <td><a href="deletep.php?id='.$res['id'].'" class="btn btn-danger">remove</a></td>
                <td><a href="editp.php?id='.$res['id'].'" class="btn btn-warning">edit</a></td>
                </tr>';
                }                
                ?>
                </tbody>
        </table>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>