<?php 
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "votcamp";

    //create a connection
    $con = mysqli_connect($servername,$username,$password,$dbname);

    
    // if(!$con){
    //     echo "Unable to connect to database<br>".mysqli_connect_error();
    // }
    
    //Check Connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    ?>