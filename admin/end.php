<?php

session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: adminlogin.php");
    exit();
}

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "TRUNCATE TABLE vote_status";

    if (mysqli_query($conn, $sql)) {
        header("Location: admindashboard.php");
        exit();  // Ensure the script stops after the redirect
    } else {
        echo "Error truncating the table: " . mysqli_error($conn);
}
}