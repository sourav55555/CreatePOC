<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>profile</title>
</head>
<style>
    img{
        height: 10rem;

    }
    .container{
        display: flex;
        flex-direction: column;
    }
    .row{
        width: 25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: auto;
    }
    .row p{
        font-size: 1.1rem;
        text-align: left;
        margin: .4rem;
    }
    h3{
        margin: 1.1rem;
        color: blueviolet;
    }
    .submit{
        margin: 1rem;
        text-decoration: none;
        text-align: center;
        display: grid;
        place-content: center;
    }
    .logout{
        margin: 1rem;
        text-decoration: none;
        text-align: center;
       
        display: block;
        height: 2.5rem;
        width: 8rem;
        font-size: 1.1rem;
        border-radius: 10px;
        background-color: yellow;
        box-shadow: 3px 5px 10px rgba(17, 17, 18, 0.8);
        color: black;
        border: none;
        cursor: pointer;
        display: grid;
        place-content: center;
    }
</style>
<body>
    <div class="container">
        <h3>Your Profile</h3>

        <?php
        include 'connect.php';
        session_start();

        $email=$_SESSION['email'];
            $selectquery="select* from podreg where email='$email'";
            $sql= $con->query($selectquery);
            $data=$sql->fetch(PDO::FETCH_ASSOC);
            //echo "<pre>";
            //print_r($data);
            //echo "</pre>";
        ?>

        <div class="row">
        <p>
            Id:<?php  
     
               echo $data['id'];
            
            ?>
        </p>
        <p>
            Name: <?php echo $data['name']; ?>
        </p>
        <p>
            Email: <?php echo $data['email']; ?>
        </p>
        <p>
        Gender: <?php echo $data['gender']; ?>
        </p>
        <img src=" <?php echo $data['image'];  ?>" alt="">
        </div>
        <a class="submit" href="update.php">Edit Profile</a>
        <a class="logout" href="login.php">LogOut</a>
    </div>
</body>
</html>

