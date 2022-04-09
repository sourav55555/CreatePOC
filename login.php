<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<style>
    .inputs p{
       width: 8.5rem;
    }
</style>
<body>
    <div class="container">
        <div class="row1">
            <h3>Login Here.</h3>
            <hr>
            <form action="" method="POST">
           
            <div class="inputs">
                <p>Email:</p>
                <input type="email" name="email" id="" placeholder="Enter your email" required>
            </div> 
                <div class="inputs" >
                    <p>Password:</p>
                    <input type="password" name="password" id="" placeholder="Enter your password" required>
                </div>
          
                <input class="log" type="submit" name="submit" id="" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
<?php


include 'connect.php';
  

if(isset($_POST['submit'])){


  
   $email=$_POST['email'];
   $password=$_POST['password'];
   $selectquery="select * from podreg where email='$email'";
   $sql= $con->query($selectquery);
    session_start();
    $_SESSION['email']="$email";

   $result=$sql->fetch(PDO::FETCH_ASSOC);

    $_SESSION['result']=$result;



      // $res= $result->rowCount();
     //     echo $res;
     if($result==""){
           
        ?>
        <script>
            alert("Invalid email");
        </script>
        <?php

    
    }
    else{
        $dbpass=$result['password'];
        if($password==$dbpass){
            header("location:profile.php?");
        }
        else{
            ?>
               <script>
                   alert('Incorrect password');
               </script>
            <?php
         
        };   
    }

}

?>