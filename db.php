<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "traindb";
    
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' . mysqli_connect_error());
        }
?>
<!-- (MySQLi Procedural) -->