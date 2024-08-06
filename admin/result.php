<?php
$title = "Results";
include_once '../config/database.php';
include 'aheader.php'; 

$sql = "SELECT * FROM candidates";
$collection = mysqli_query($conn, $sql);

if ($collection) {
    $max_votes = 0;
    $winner = null;

    while ($item = mysqli_fetch_assoc($collection)) {
        $cid = $item['cid'];
        $vote_sql = "SELECT COUNT(*) as count FROM votes WHERE cid = $cid";
        $total_vote_result = mysqli_query($conn, $vote_sql);

        if ($total_vote_result) {
            $total_vote = mysqli_fetch_assoc($total_vote_result);
            $vote_count = $total_vote['count'];
            echo "Candidate ID: $cid - Total Votes: $vote_count<br>";

            if ($vote_count > $max_votes) {
                $max_votes = $vote_count;
                $winner = $item;
            }
        } else {
            echo "Error: " . mysqli_error($conn) . "<br>";
        }
    }

    if ($winner) {
        echo "<br>Candidate with Maximum Votes:<br>";
        echo "Candidate ID: " . $winner['cid'] . " - Name: " . $winner['candidatename'] . " - Total Votes: $max_votes";
    } else {
        echo "No votes found.";
    }
} else {
    echo "Error: " . mysqli_error($conn)."<br>";
}
 include 'afooter.php'; 