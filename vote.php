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

    // Prepare a statement to check if the user has already voted
    $stmt = $conn->prepare("SELECT * FROM votes WHERE crn = ?");
    $stmt->bind_param('s', $crn);
    $stmt->execute();
    $vote_check_result = $stmt->get_result();

    if ($vote_check_result->num_rows == 0) {
        // User has not voted, proceed with vote insertion
        $stmt = $conn->prepare("INSERT INTO votes (cid, crn) VALUES (?, ?)");
        $stmt->bind_param('ss', $cid, $crn);

        if ($stmt->execute()) {
            header("Location: userdashboard.php");
            exit();
        } else {
            echo "Error: Could not insert vote. " . $stmt->error;
        }
    } else {
        // Display 'already voted' message
        
        echo '<div style="font-weight: bold; color: red; text-align: center; font-size: 50px; margin-top:20rem;">
                You have already voted.
                </div>';
    }
}

?>
<div style="font-weight: bold; color: red; text-align: center; font-size: 30px;">
<a href="userdashboard.php">Back</a>
<a href="index.php">Logout</a>
</div>

