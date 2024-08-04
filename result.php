<?php
session_start();

$title = "Winner";
include_once 'config/database.php';

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
            background-color: #f0f8ff;
            text-align: center;
            padding: 50px;
        }
        .winner-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            padding: 20px;
            margin-top: 50px;
        }
        .winner-header {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .winner-name {
            font-size: 36px;
            color: blue;
        }
    </style>
</head>
<body>

<div class="winner-container">
    <?php
    if (isset($_SESSION['winner'])) {
        $winner = $_SESSION['winner'];
        echo "<div class='winner-header'>Winner with Maximum Votes is:</div>";
        echo "<div class='winner-name'>" . $winner['candidatename'] . "</div>";
    } else {
        echo "<div class='winner-header'>No winner information available.</div>";
    }
    ?>
</div>

</body>
</html>

