<?php
$title = "Results";
include_once 'config/database.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .candidate-list {
            margin-top: 20px;
        }
        .candidate {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .candidate:last-child {
            border-bottom: none;
        }
        .candidate strong {
            display: block;
            font-size: 1.2em;
            color: #333;
        }
        .winner {
            margin-top: 20px;
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
        .error {
            color: #d9534f;
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Election Results</h1>
        <div class="candidate-list">
            <?php
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
                        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
                    }
                }

                if ($winner) {
                    echo "<div class='winner'><strong>Candidate with Maximum Votes:</strong><br>" . $winner['candidatename'] . "</div>";
                } else {
                    echo "<div class='error'>Winner not declared yet!</div>";
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
