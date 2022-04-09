
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Update</title>
</head>
<style>
 
    .delete{
        font-size: 1.1rem;
        width: 11rem;
        height: 2.6rem;
        background-color: red;
        margin: 2.2rem;
        border-radius: 14px;
        border: none;
        box-shadow: 3px 5px 10px rgba(17, 17, 18, 0.8);
        color: white;
        cursor: pointer;
    }
    .d-delete{
        text-align: center;
    }
</style>
<body>
    <div class="container">
       <div class="row">
       <h3>Update Form</h3>
          <?php
           include "connect.php";
           session_start();
           $email1= $_SESSION['email'];
           $select= "select * from podreg where email='$email1'";
           $sql= $con->query($select);
            $result= $sql->fetch();
          // print_r($res);
          //echo $result['image'];
          

           if(isset($_POST['submit'])){
               $name= $_POST['name'];
               $email= $_POST['email'];
               $gender= $_POST['gender'];
               $photo=$_FILES['uploadfile'];


               $password= $_POST['password'];
               $cpassword= $_POST['cpassword'];
             //  $ema=$result['email'];
             //  echo $ema;
              $imgName= $_FILES['uploadfile']['name'];
              $imgSize= $_FILES['uploadfile']['size'];
              $tmpName= $_FILES['uploadfile']['tmp_name'];
              $error= $_FILES['uploadfile']['error'];
          
              if($error==0){
                  $up_path="upload/".$imgName;
                  move_uploaded_file($tmpName,$up_path);
          
                  if($password==$cpassword && strlen($password)>4){
                      $updatequery= "update podreg set name='$name',email='$email',gender='$gender',image='$up_path',password='$password' where email='$email1';";
                      $con->exec($updatequery);

                      $_SESSION['email']="$email";

                      ?>
                          <script>
                              alert('Update successful');
                              location.replace('http://localhost:8012/pdotry/profile.php')
                          </script>
                      <?php
          
                      }
                      elseif($password !== $cpassword){
                          echo"confirm password not match";
                      }
                      else{
                          echo"password length minimum 5 character";
                      }
              }
           //   if($upd){
           //       echo"update successful";
           //   }
           //   else{
           //       echo "can not update";
           //   }
            }
          ?>

        <form method="POST" action="" enctype="multipart/form-data">
           <div class="col">
           <div class="col-1">
           <div class="inputs">
                <p>Full Name:</p>
                <input type="text" name="name" value="<?php echo $result['name']; ?>" placeholder="Enter your name" required>
            </div>
            
            <div class="inputs">
                <p>Email:</p>
                <input type="email" name="email" id="" placeholder="Enter your email" value="<?php  echo $result['email']; ?>" required>
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
                   name="uploadfile"/>
                </div>
                <div class="inputs">
                    <p>Password:</p>
                    <input type="password" name="password" id="" placeholder="Create password" value="<?php echo $result['password']; ?>" required>
                </div>
                <div class="inputs">
                    <p>Confirm password:</p>
                    <input type="password" name="cpassword" id="" placeholder="Confirm password" value="<?php echo $result['password']; ?>">
                </div>
            </div>
           </div>
            <input class="submit" type="submit" name="submit" id="" value="Submit">
        </form>
        <div class="d-delete">
              <form action="" method="post">
              <input class="delete" type="submit" value="Delete Account" name="delete">
              </form>
        </div>
       </div>
    </div>
</body>
</html>
<?php
  if(isset($_POST['delete'])){
      $demail=$result['email'];
      $deletequery= "delete from podreg where email='$demail'";
      $sou= $con->exec($deletequery);
      if($sou){
          ?>
            <script>
                alert('deleted successfully');
                location.replace('http://localhost:8012/pdotry/login.php')
            </script>
          <?php
      }
  }
?>