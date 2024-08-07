<?php
session_start();

include 'config/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$crn=$_POST['crn'];
//$username=$_POST['username'];
$userpassword=$_POST['userpassword'];
$check = mysqli_query($conn,"SELECT * FROM users WHERE crn='$crn' AND userpassword='$userpassword'");

if (mysqli_num_rows($check)>0){
   // $userdata= mysqli_fetch_array($check);
    $_SESSION['crn']=$crn;

    echo '
    <script>
    window.location = "userdashboard.php" </script>';
}
else {
    echo '<script> 
    alert("Invalid Credentials")
    </script>';
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote-Camp User Login</title>
    <link rel="stylesheet" href="assets/index.css">
    <!-- <script>
        function validateForm() {
            var crn = document.getElementById("crn").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("userpassword").value;

            if (crn == "" || username == "" || password == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script> -->
</head>
<body>
    <div class="left-side">
        <img src="assets/leftside.jpg" alt="Image">
    </div>
    <div class="right-side">
        <nav>
            <a href="admin/adminlogin.php" class="signin-btn">Signin as Admin</a>
        </nav>
        <div class="container">
            <h2>Login</h2>
            <form method="post" action="" onsubmit="return validateForm()">
                <label for="crn">CRN Number:</label>
                <input type="text" id="crn" name="crn" required>
                <label for="password">Password:</label>
                <input type="password" id="userpassword" name="userpassword" required>
                <button type="submit" class="login-btn">Login</button>
                <p>Don't have an account? <a href="register.php">SignUp</a></p>
            </form>
        </div>
    </div>
</body>
</html>