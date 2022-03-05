<html>
<head>
    <title>display php</title>
    <meta charset="utf-8">
    <style>
        #special {
            color:red;
            background:blue;
            min-height: 3em;
            
        }
    </style>
    </head>
    <body>
        <h4 id='special'>
        
            <?php 
    $name = $_POST['name'];
if(strlen($name) > 1 ) {    
    echo "hello $name";
}
?></h4>
    
    </body>
</html>
