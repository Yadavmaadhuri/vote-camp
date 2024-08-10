<?php
session_start();
$crn = $_SESSION['crn'];

if (!isset($_SESSION['crn'])) {
    header("location: login.php");
    exit();
}

$title = "Results";
include_once 'config/database.php';

// Fetch the user's batch and faculty
$user_sql = "SELECT batch, faculty FROM users WHERE crn = '$crn'";
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);

if (!$user) {
    die("User not found.");
}

$user_batch = $user['batch'];
$user_faculty = $user['faculty'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href='assets/styles.css'> 
</head>
<body>
<div class="udcontainer">
    <nav class="navbar" style="display: flex; align-items: center;">
        <img src="assets/hdclogo.png" style="margin: 0; padding: 0; height: 30px;">
        <ul style="list-style-type: none; margin-left: auto; display: flex; gap: 15px;">
            <li><a href="userdashboard.php">Home</a></li>
            <li><a href="result.php" class="active">Result</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </nav>
</div>

<div class="vote-container">
    <h1>Election Results for Batch <?php echo htmlspecialchars($user_batch); ?> - Faculty <?php echo htmlspecialchars($user_faculty); ?></h1>
    <div class="candidate-list">
        <?php
        // Fetch candidates and their votes for the user's batch and faculty
        $sql = "SELECT candidates.candidatename, candidates.cid, candidates.batch, candidates.faculty, COUNT(votes.cid) as vote_count 
                FROM candidates 
                LEFT JOIN votes ON candidates.cid = votes.cid 
                WHERE candidates.batch = '$user_batch' AND candidates.faculty = '$user_faculty' 
                GROUP BY candidates.cid 
                ORDER BY vote_count DESC";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $max_votes = 0;
            $winners = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $vote_count = $row['vote_count'];

                if ($vote_count > $max_votes) {
                    $max_votes = $vote_count;
                    $winners = [$row]; // Reset winners array with current candidate
                } elseif ($vote_count == $max_votes) {
                    $winners[] = $row; // Add candidate to winners array
                }
            }

            if (count($winners) > 1) {
                echo "<div class='winner'><strong>There is a tie between the following candidates:</strong><br>";
                foreach ($winners as $winner) {
                    echo htmlspecialchars($winner['candidatename']) . " (Batch: " . htmlspecialchars($winner['batch']) . " - Faculty: " . htmlspecialchars($winner['faculty']) . ")<br>";
                }
                echo "Each has $max_votes votes.</div>";
            } elseif (count($winners) == 1) {
                $winner = $winners[0];
                echo "<div class='winner'><strong>Candidate with Maximum Votes till now:</strong><br>" 
                    . htmlspecialchars($winner['candidatename']) 
                    . " (Batch: " . htmlspecialchars($winner['batch']) . " - Faculty: " . htmlspecialchars($winner['faculty']) . ")"
                    . " with $max_votes votes.</div>";
            } else {
                echo "<div class='error'>No votes have been cast yet.</div>";
            }
        } else {
            echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
