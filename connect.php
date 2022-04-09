<?php

$user= 'root';
$password="";
$server="localhost";
$con= new PDO("mysql:host=$server;dbname=pod",$user,$password);

if($con){
   // echo "connection successful";
}
else{
    ?>
     <script>
         alert('No connection');
     </script>
    <?php
}

?>