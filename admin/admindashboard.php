<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: adminlogin.php");
    exit();
}

require_once('../config/database.php');
$sql = "SELECT * FROM candidates";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href='../assets/styles.css'>
</head>
<body>


<?php include 'aheader.php'; ?>

   
        <h1>Vote Here</h1>
        <div class="table-container">
            <div class="table-content">
                <table>
                    <thead>
                        <tr>
                            <th style="text-align:center;">Candidate's Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>
                                        <div class='candidates'>
                                            <div class='candidate' style='width:90%;'>
                                                <span class='candidate-name'>{$row['candidatename']}</span>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td>No candidates found.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include 'afooter.php'; ?>
    </div>
</body>
</html>
