<?php

session_start();
if (!isset($_SESSION['crn'])) {
    header("location: index.php");
    exit();  
}

$crn = $_SESSION['crn']; 
$title = "Vote";
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cid = $_POST['cid'];
    $crn = $_POST['crn'];
    $batch = $_POST['batch'];
    $batch = $_POST['batch'];
    $faculty = $_POST['faculty'];
    $faculty = $_POST['faculty'];


   $sql="SELECT count(u.*) from user u left join candidate c on c.faculty=u.faculty and
     c.batch=u.batch where u.id ='userid' and c.id='candidateid'" ;

   if (mysqli_query($conn, $sql)) {
    // Check if the user's batch and faculty match the candidate's batch and faculty
    if ($batch == $batch && $faculty == $faculty) {
        $sql = "INSERT INTO votes (cid, crn) VALUES ('$cid', '$crn')";

        if (mysqli_query($conn, $sql)) {
            header("Location: userdashboard.php");
            exit();
        } else {
            echo "Error adding the details: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: Batch and Faculty do not match!";
    }
}

}
// Retrieve the last vote (if needed for other logic)
$sql = "SELECT * FROM votes WHERE cid = (SELECT MAX(cid) FROM votes)";
$result = mysqli_query($conn, $sql);


