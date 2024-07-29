<?php
include '../config/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$candidatename=$_POST['candidatename'];
$crn=$_POST['crn'];


     $sql = "INSERT INTO candidates(candidatename,crn) VALUES ('$candidatename','$crn')";
      
          
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
<form action="" method="post">
<label for="username">username:</label>
<input type="text" id="candidatename" name="candidatename" required>
<label for="crn">crn:</label>
<input type="number" id="crn" name="crn" required>
<input type="submit" value="submit">
</form>
</body>
</html>