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
    <nav class="navbar" style="display: flex; align-items: center;">
        <img src="../assets/hdclogo.png" style="margin: 0; padding: 0; height: 30px;">
        <ul style="list-style-type: none; margin-left: auto; display: flex; gap: 15px;">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a href="candidate.php">Add candidate</a></li>
            <li><a href="result.php" class="active">Vote Info</a></li>
            <li><a href="adminlogin.php">Logout</a></li>
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
            $results = [];
            
            // Collect votes for each candidate grouped by faculty and batch
            while ($item = mysqli_fetch_assoc($collection)) {
                $cid = $item['cid'];
                $candidatename = $item['candidatename'];
                $batch = $item['batch'];
                $faculty = $item['faculty'];
                
                $vote_sql = "SELECT COUNT(*) as count FROM votes WHERE cid = $cid";
                $total_vote_result = mysqli_query($conn, $vote_sql);

                if ($total_vote_result) {
                    $total_vote = mysqli_fetch_assoc($total_vote_result);
                    $vote_count = $total_vote['count'];
                    
                    $results[$faculty][$batch][] = [
                        'cid' => $cid,
                        'candidatename' => $candidatename,
                        'votes' => $vote_count
                    ];
                } else {
                    echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
            
            // Display results grouped by faculty and batch
            foreach ($results as $faculty => $batches) {
                echo "<h2>Faculty: $faculty</h2>";
                
                foreach ($batches as $batch => $candidates) {
                    echo "<h3>Batch: $batch</h3>";

                    $max_votes = 0;
                    $winners = [];

                    foreach ($candidates as $candidate) {
                        echo "<div class='candidate'><strong>Candidate Name: {$candidate['candidatename']}</strong> 
                        <br/>Total Votes: {$candidate['votes']}</div>";

                        if ($candidate['votes'] > $max_votes) {
                            $max_votes = $candidate['votes'];
                            $winners = [$candidate];
                        } elseif ($candidate['votes'] == $max_votes) {
                            $winners[] = $candidate;
                        }
                    }

                    if (count($winners) > 1) {
                        echo "<div class='winner'><strong>There is a tie between the following candidates:</strong><br>";
                        foreach ($winners as $winner) {
                            echo "Candidate Name: " . $winner['candidatename'] . "<br>";
                        }
                        echo "Each has $max_votes votes.</div>";
                    } elseif (count($winners) == 1) {
                        $winner = $winners[0];
                        echo "<div class='winner'><strong>Candidate with Maximum Votes till now :</strong><br>Candidate Name: " . $winner['candidatename'] . " - Total Votes: $max_votes</div>";
                    } else {
                        echo "<div class='error'>Winner not declared yet!</div>";
                    }
                }
            }
        } else {
            echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
        }
        ?>
    </div>
</div>
<?php include '../footer.php'; ?>
</body>
</html>
