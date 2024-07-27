<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "votcamp";
 $conn = mysqli_connect("localhost", "root", "", "votcamp");
 
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
 ?>