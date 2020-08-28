<?php

error_reporting(0);
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="taro";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("Could not connect to the database!:".mysqli_connect_error());
}
else{
    if(isset($_POST['submit'])){
        $result="";
        $image='imageUpload/'.$_FILES['image']['name'];
        $image=mysqli_real_escape_string($conn,$image);
        
        if(preg_match("!image!", $_FILES['image']['type'])){
            if(copy($_FILES['image']['tmp_name'], $image)){
                $sql= "INSERT INTO imageupload(imagepath) VALUES('$image')";
                
                if(mysqli_query($conn,$sql)){
                    $result="Image Successfully Uploaded!";
                    
            
                }
                else{
                    $result="Image Upload failed!";
                }
            }
            else{
               $result="Image Upload failed!"; 
            }
        }
        else{
            $result="Only upload JPG, PNG & GIF Images!";
        }
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>IMAGE UPLOAD USING PHP </title>
    <style type="text/css">
        *{
          margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        
        .previewImage{
            width: 300px;
            margin: 0 auto;
            overflow: hidden;
            
        }
        img{
            width 300px;
            height: auto;
            
        }
    </style>
    </head>
    <body>
    <div class="main">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="image">Upload Image</label>
            <hr>
            <input type="file" name="image" class="inp" required>
            <input type="submit" name="submit" value="Upload" class="btn">
        </form><br>
        <h2><?= $result ?> </h2> 
        </div>
        
    <div class="previewImage"><img src="<?= $image ?>" width="200" height="100"></div>
       
    
    </body>


</html>