<?php 
    include('./inc/connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>add product page </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
            <form action='' method="POST" style="text-align:center;" enctype="multipart/form-data">
    <input  class="form-control" type='text' name='pname' placeholder='name of product'>
        <input class="form-control"  type='text' name='pdescription' placeholder='Description'>
        <input class="form-control"  type='text' name='price' placeholder='price'>    
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
            $image = $_FILES['img']['name'];
                $sql = "insert into products(product_name, product_price, description, img) values('$name', '$price', '$desc', '$image')";
                $ret = mysqli_query($connection, $sql);
                if($ret) {echo 'your product added success!';
                         } else {
                    echo 'you are having error';
                }
                
            }
        }
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>