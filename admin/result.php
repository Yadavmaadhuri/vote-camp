<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: adminlogin.php");
    exit();
}
$title = "Results";
include_once '../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href='../assets/styles.css'>
</head>
<body>
    
<div class="udcontainer">
    
    <nav class="navbar">
    <ul>
        <li><a href="admindashboard.php" >Home</a></li>
        <li><a href="candidate.php" >Add Candidate</a></li>
        <li><a href="result.php" class="active" >Vote info</a></li>
        <li><a href="adminlogout.php" >Logout</a></li>
    </ul>
</nav>
</div>
    <div class="vote-container">
        <h1>Election Results</h1>
        <div class="candidate-list">
            <?php
            $sql = "SELECT * FROM candidates";
            $collection = mysqli_query($conn, $sql);

            if ($collection) {
                $max_votes = 0;
                $winners = [];

                while ($item = mysqli_fetch_assoc($collection)) {
                    $cid = $item['cid'];
                    $candidatename = $item['candidatename'];
                    $vote_sql = "SELECT COUNT(*) as count FROM votes WHERE cid = $cid";
                    $total_vote_result = mysqli_query($conn, $vote_sql);

                    if ($total_vote_result) {
                        $total_vote = mysqli_fetch_assoc($total_vote_result);
                        $vote_count = $total_vote['count'];
                        echo "<div class='candidate'><strong>Candidate ID: $cid Candidate Name: $candidatename</strong> 
                        <br/>Total Votes: $vote_count</div>";

                        if ($vote_count > $max_votes) {
                            $max_votes = $vote_count;
                            $winners = [$item]; // Reset winners array with current candidate
                        } elseif ($vote_count == $max_votes) {
                            $winners[] = $item; // Add candidate to winners array
                        }
                    } else {
                        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
                    }
                }

                if (count($winners) > 1) {
                    echo "<div class='winner'><strong>There is a tie between the following candidates:</strong><br>";
                    foreach ($winners as $winner) {
                        echo "Candidate ID: " . $winner['cid'] . " - Name: " . $winner['candidatename'] . "<br>";
                    }
                    echo "Each has $max_votes votes.</div>";
                } elseif (count($winners) == 1) {
                    $winner = $winners[0];
                    echo "<div class='winner'><strong>Candidate with Maximum Votes:</strong><br>Candidate ID: " . $winner['cid'] . " - Name: " . $winner['candidatename'] . " - Total Votes: $max_votes</div>";
                } else {
                    echo "<div class='error'>Winner not declared yet!</div>";
                }
            } else {
                echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
            }
            ?>
        </div>
    </div>
<?php include 'afooter.php'; ?>
</body>
</html>
