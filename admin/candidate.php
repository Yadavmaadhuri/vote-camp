<?php
$currentPage = 'candidate'; // Set this to the page name
?>
<?php
include '../config/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$candidatename=$_POST['candidatename'];
$id=$_POST['id'];


     $sql = "INSERT INTO candidates(candidatename,cid) VALUES ('$candidatename','$id')";
      
          
  if(mysqli_query($conn, $sql)){
        header("Location: admindashboard.php");
    }

  else{
    echo "ERROR: Hush! Sorry $sql. " 
    . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>candidateform</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
   
<div class="udcontainer">
    
    <nav class="navbar">
    <ul>
        <li><a href="admindashboard.php">Home</a></li>
        <li><a href="candidate.php"  class="active" >Add Candidate</a></li>
        <li><a href="result.php" >Vote info</a></li>
        <li><a href="adminlogout.php" >Logout</li></a>
    </ul>
</nav>
</div>
    <div class="form-container">
        <form class="candidate-form" action="" method="post">
            <p>Add Candidate</p>
            <label for="username">Username:</label>
            <input type="text" id="candidatename" name="candidatename" required>
            <label for="id">Candidate ID:</label>
            <input type="number" id="id" name="id" required>
            <input type="submit" value="submit">
        </form>
    </div>
    <?php include 'afooter.php'; ?>
</body>
</html>