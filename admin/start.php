
<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: adminlogin.php");
    exit();
}

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT IGNORE INTO vote_status(status) VALUES ('T')";

    if (mysqli_query($conn, $sql)) {
      header("Location: admindashboard.php");
      
    } else {
      echo "Error adding the details: " . $sql . "<br>" . mysqli_error($conn);
    }

}
