<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Registration</title>
</head>
<body>
    <div class="container">
       <div class="row">
       <h3>Registration Form</h3>
        <form method="POST" action="" enctype="multipart/form-data">
           <div class="col">
           <div class="col-1">
           <div class="inputs">
                <p>Full Name:</p>
                <input type="text" name="name" placeholder="Enter your full name" required>
            </div>
            
            <div class="inputs">
                <p>Email:</p>
                <input type="email" name="email" id="" placeholder="Enter your email" required>
            </div>
            <div class="inputs">
                <p>Gender:</p>
                <label for="male">Male</label>
                <input class="gender" type="radio" name="gender" value="male" id="male">
                <label for="female">Female</label>
                <input class="gender" type="radio" name="gender" id="female" value="female">
            </div>
           </div>
            <div class="col-1">
                <div class="inputs">
                    <p>Attach a photo</p>
                    <input type="file" 
                   name="uploadfile" 
                   value="" />
                </div>
                <div class="inputs">
                    <p>Password:</p>
                    <input type="password" name="password" id="" placeholder="Create password" required>
                </div>
                <div class="inputs">
                    <p>Confirm password:</p>
                    <input type="password" name="cpassword" id="" placeholder="Confirm password">
                </div>
            </div>
           </div>
            <input class="submit" type="submit" name="submit" id="" value="Submit">
        </form>
        <div class="login">
              <p>Already have an account?</p>
              <a class="login" href="login.php">Login here</a>
        </div>
       </div>
    </div>
</body>
</html>

<?php 

 include "connect.php";

 if(isset($_POST['submit'])){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $photo= $_FILES['uploadfile'];
    $password= $_POST['password'];
    $cpassword=$_POST['cpassword'];

    //echo"<pre>";
    //print_r($photo);
    //echo"</pre>";

    $imgName= $_FILES['uploadfile']['name'];
    $imgSize= $_FILES['uploadfile']['size'];
    $tmpName= $_FILES['uploadfile']['tmp_name'];
    $error= $_FILES['uploadfile']['error'];

    if($error==0){
        $up_path="upload/".$imgName;
        move_uploaded_file($tmpName,$up_path);

        if($password==$cpassword && strlen($password)>4){
            $insertquery= "insert into podreg(name,email,gender,image,password) values('$name','$email','$gender','$up_path','$password')";
            $con->exec($insertquery);

            session_start();
            $_SESSION['email']=$email;
            
            ?>
                <script>
                    alert('Registration successful');
                    location.replace("http://localhost:8012/pdotry/profile.php");
                </script>
            <?php
            }
            elseif($password !== $cpassword){
                ?>
                <script>
                    alert('confirm password not matched');
                </script>
                <?php
            }
            else{

                ?>
                <script>
                    alert('password length minimum 5 character');
                </script>
                <?php

            }
    }
    
 }


?>