
 <?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: index.php");
}
include_once 'config/database.php';
$sql = "SELECT * FROM candidates";
$result = mysqli_query($conn, $sql);
?> 
 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href='assets/styles.css'>
</head>
<body>
    <div class="udcontainer">
    
    <!-- <h2 style="color:red">userdashboard</h2> -->
    <nav class="navbar">
        
    <ul>
        <li><a href="userdashboard.php">Home</a></li>
        <li><a href="result.php">Result</a></li>
        <li><a href="logout.php">Logout</li></a>
    </ul>
</nav>


        <h1>vote Here</h1>
       <?php
        if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='candidates'>
            <div class='candidate' style='width:90%;'>
                <span class='candidate-name'>".$row['candidatename']."</span>
                <button class='vote-btn'>Vote</button>
            </div>
            
            </div>";
         
                    }
                }
            ?>
    </div>
</body>
</html>

