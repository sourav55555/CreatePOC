<!DOCTYPE html>
<html>
  
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" 
          type="text/css"
          href="style.css" />
</head>
  
<body>
    <div id="content">
  
    <form method="POST" 
            action="" 
              enctype="multipart/form-data" >
              
           
            <input class="submit" type="submit" name="submit" id="" value="Submit">
        </form>
    </div>
</body>
  
</html>
<?php
    include "connect.php";
    session_start();
    $email1= $_SESSION['email'];
    $select= "select * from podreg where email='$email1'";
    $sql= $con->query($select);
     $res= $sql->fetch();

     $newarr= array("name"=>"sourav","age"=>25,"gender"=>"male");
     echo "<pre>";
     print_r($newarr);
    echo "</pre>";

    
    echo "<pre>";
     print_r($res);
    echo "</pre>";
   // $ema=$res['email'];
     //          echo $ema;
     echo $newarr['name'];

if(isset($_POST['submit'])){
  // $ema=$res[2];
  //            echo $ema;
}

?>