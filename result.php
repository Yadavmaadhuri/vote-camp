<?php
$title = "Results";
include_once 'config/database.php';

 include 'header.php';

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
        echo  $winner['candidatename'];
    } else {
        echo "Winner not declared yet!";
    }
} else {
    echo "Error: " . mysqli_error($conn)."<br>";
}

include 'footer.php';
