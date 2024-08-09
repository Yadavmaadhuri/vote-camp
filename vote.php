<?php
session_start();
if (!isset($_SESSION['crn'])) {
    header("location: login.php");
    exit();  
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'config/database.php';

    $cid = $_POST['cid'];  // Candidate ID
    $crn = $_POST['crn'];  // User CRN

    // Check if the user has already voted
    $vote_check_sql = "SELECT * FROM votes WHERE crn = '$crn'";
    $vote_check_result = mysqli_query($conn, $vote_check_sql);

    if (mysqli_num_rows($vote_check_result) == 0) {
        // User has not voted, proceed with vote insertion
        $sql = "INSERT INTO votes (cid, crn) VALUES ('$cid', '$crn')";

        if (mysqli_query($conn, $sql)) {
            header("Location: userdashboard.php");
            exit();
        } else {
            echo "Error: Could not insert vote. " . mysqli_error($conn);
        }
    } else {
        echo "You have already voted.";
    }
}
?>