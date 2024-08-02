<?php
include 'config/database.php';
session_start();

function login($crn, $username, $password) {
    $conn = connect();
    $sql = "SELECT * FROM users WHERE crn='$crn' AND username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['crn'] = $user['crn'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crn = $_POST['crn'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($crn, $username, $password)) {
        header("Location: userdashboard.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote-Camp User Login</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script>
        function validateForm() {
            var crn = document.getElementById("crn").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (crn == "" || username == "" || password == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="" onsubmit="return validateForm()">
            <label for="crn">CRN Number:</label>
            <input type="text" id="crn" name="crn" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="Login-btn">Login</button>
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>