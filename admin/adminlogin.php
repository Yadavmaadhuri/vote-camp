<?php
require_once('../config/database.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $username = stripcslashes($_POST['username']);
    $password = $_POST['password'];
  
    $sql = "select * from sadmin where adminusername = '$username' and adminpassword = '$password'";
    
    $sresult = mysqli_query($conn,$sql);
    
    $scount = mysqli_num_rows($sresult);
  
    if($scount == 1){
       
            $_SESSION['uid'] = 1;
            header("Location: admindashboard.php");

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System Registration</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
          
            <button type="submit" class="Login-btn">Login</button>
            
        </form>
    </div>
</body>  
</html>
