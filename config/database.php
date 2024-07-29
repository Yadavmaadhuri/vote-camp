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



//creating table for Admin
$sql = "CREATE TABLE IF NOT EXISTS sadmin(
    sid INT PRIMARY KEY AUTO_INCREMENT,
    adminusername VARCHAR(30) NOT NULL,
    adminpassword varchar(10) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    // echo "<br>";
    //echo "Table Created Successfully.";
} else {
    echo "<br>";
    echo "Error Creating table" . mysqli_error($conn);
}

$sql = "INSERT IGNORE INTO sadmin(sid,adminusername,adminpassword) VALUES ('101','admin@gmail.com','admin123')";
if (mysqli_query($conn, $sql)) {
    // echo "<br>";
    //echo "Data inserted Successfully.";
} else {
    echo "<br>";
    echo "Error Inserting data" . mysqli_error($conn);
}



 
 
 //creating table for candidates
$sql = "CREATE TABLE IF NOT EXISTS candidates(
    cid INT PRIMARY KEY AUTO_INCREMENT,
    candidatename VARCHAR(30) NOT NULL,
    crn VARCHAR(10) NOT NULL

    )";
    if(mysqli_query($conn,$sql)){

    }
    else{
        echo  "<br>";
    }
    ?>