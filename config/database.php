<?php
// function connect(){
//     $hostname = "localhost";
//      $username = "root";
//      $password = "";
//      $dbname = "Votcamp";
 
//      $conn = mysqli_connect($hostname, $username, $password, $dbname);
     
//      if(!$conn){
//          die("Connection failed: " . mysqli_connect_error());
//      }
//      else{
//          return $conn;
//      }
//  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votcamp";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if(mysqli_query($conn, $sql)){
    // echo "Database created successfully.";
} else {
    die("ERROR: Could not create database. " . mysqli_error($conn));
}


// Connect to the newly created database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}

// Create table for users
$sql = "CREATE TABLE IF NOT EXISTS users(
    crn INT PRIMARY KEY NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    userpassword VARCHAR(255) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
    // echo "Table 'users' created successfully.";
} else {
    echo "Error creating 'users' table: " . mysqli_error($conn);
}

// Create table for Admin
$sql = "CREATE TABLE IF NOT EXISTS sadmin(
    sid INT PRIMARY KEY AUTO_INCREMENT,
    adminusername VARCHAR(30) NOT NULL,
    adminpassword VARCHAR(255) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    // echo "Table 'sadmin' created successfully.";
} else {
    echo "Error creating 'sadmin' table: " . mysqli_error($conn);
}

// Insert default admin user
$sql = "INSERT IGNORE INTO sadmin (sid, adminusername, adminpassword) VALUES (101, 'admin@gmail.com', 'admin123')";
if (mysqli_query($conn, $sql)) {
    // echo "Admin user inserted successfully.";
} else {
    echo "Error inserting admin user: " . mysqli_error($conn);
}

// Create table for candidates
$sql = "CREATE TABLE IF NOT EXISTS candidates(
    cid INT PRIMARY KEY AUTO_INCREMENT,
    candidatename VARCHAR(30) NOT NULL,
    -- crn VARCHAR(10) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    // echo "Table 'candidates' created successfully.";
} else {
    echo "Error creating 'candidates' table: " . mysqli_error($conn);
}



// Create table for votes
$sql = "CREATE TABLE IF NOT EXISTS votes(
    crn INT PRIMARY KEY ,
    username VARCHAR(30) NOT NULL,
    candidatename VARCHAR(30) NOT NULL,
    cid INT PRIMARY KEY,
    FOREIGN KEY (crn) REFERENCES users(crn),
    FOREIGN KEY (username) REFERENCES users(username),
    FOREIGN KEY (candidatename) REFERENCES candidates(candidatename),
    FOREIGN KEY (cid) REFERENCES candidates(cid),
   
)";
if (mysqli_query($conn, $sql)) {
    // echo "Table 'votes' created successfully.";
} else {
    echo "Error creating 'candidates' table: " . mysqli_error($conn);
}
