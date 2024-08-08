<?php
include 'config/database.php';

// Define variables and initialize with empty values
$crn = $username  = $password = $confirm_password = "";
$crn_err = $username_err  = $password_err = $confirmpassword_err = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate CRN
    if (empty(trim($_POST["crn"]))) {
        $crn_err = "Please enter a CRN.";
        
    } else {
        $crn = trim($_POST["crn"]);
        if (!is_numeric($crn) || strlen($crn) != 5) {
            $crn_err = "CRN must be exactly 5 digits.";

        } else {
            // Prepare and execute query to check if CRN already exists
            $sql = "SELECT crn FROM users WHERE crn = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $crn);
                $stmt->execute();
                $stmt->store_result();
                
                if ($stmt->num_rows > 0) {
                    $crn_err = "CRN already exists.";
                }
                
                $stmt->close();
            }
        }
    }

    

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
        if (strlen($username) < 3 || strlen($username) > 15) {
            $username_err = "Username must be between 3 and 10 characters long.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $username)) {
            $username_err = "Username must contain only alphabets.";
        }
    }
    


    // Validate password
    if (!isset($_POST["password"]) || empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 4) {
        $password_err = "Password must have at least 4 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (!isset($_POST["confirm_password"]) || empty(trim($_POST["confirm_password"]))) {
        $confirmpassword_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirmpassword_err = "Password did not match.";
        }
    }

    // Check for errors before inserting in database
    if (empty($crn_err) && empty($username_err)  && empty($password_err) && empty($confirmpassword_err)) {
        $crn = $_POST['crn'];
        $username = $_POST['username'];
        $userpassword = $_POST['password'];

        $sql = "INSERT INTO users VALUES ('$crn','$username','$userpassword')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vote-camp</title>
    <link rel="stylesheet" href="assets/index.css">
    <style>
        .error { color: red; }
    </style>
</head>
<body>
<div class="left-side">
        <img src="assets/vote.jpg" alt="Image">
    </div>
    <div class="right-side">
        <nav>
            <a href="admin/adminlogin.php" class="signin-btn">Signin as Admin</a>
        </nav>
    
    <div class="container">
            <h2>Register</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <label for="crn">CRN Number:<span style="color:red">*</span></label>
                <input type="number" id="crn" name="crn" required>
                <span class="error"><?php echo $crn_err; ?></span>

                <label for="username">Username:<span style="color:red">*</span></label>
                <input type="text" id="username" name="username" required>
                <span class="error"><?php echo $username_err; ?></span>

                <label for="password">New Password:<span style="color:red">*</span></label>
                <input type="password" id="password" name="password" required>
                <span class="error"><?php echo $password_err; ?></span>

                <label for="confirm_password">Confirm Password:<span style="color:red">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span class="error"><?php echo $confirmpassword_err; ?></span>

                <button type="submit" class="register-btn" value="Register">Register</button><br>
                <p>Already have an account? <a href="index.php">SignIn</a></p>
           
        </form>
    </div>
</body>
</html>
