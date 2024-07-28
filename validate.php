<?php
include('config/database.php');
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate CRN
    if (empty($_POST["crn"])) {
        $errors[] = "CRN Number is required.";
    } else {
        $crn = test_input($_POST["crn"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $crn)) {
            $errors[] = "Only letters and numbers are allowed in CRN Number.";
        }
    }

    // Validate username
    if (empty($_POST["username"])) {
        $errors[] = "Username is required.";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $errors[] = "Only letters and numbers are allowed in username.";
        }
    }
    // Validate email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Validate faculty
    if (empty($_POST["faculty"])) {
        $errors[] = "Faculty is required.";
    } else {
        $faculty = test_input($_POST["faculty"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $faculty)) {
            $errors[] = "Only letters and spaces are allowed in faculty.";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $errors[] = "Password is required.";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters long.";
        }
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $errors[] = "Please confirm your password.";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        }
    }

    // If there are no errors, process the data
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // to save the data to a database
      
        $sql = "INSERT INTO users (crn, username, faculty, password) VALUES ('$crn', '$username', '$faculty', '$hashed_password')";
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 

        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
   //insersion code complete

        echo "Registration successful!";
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

// Function to clean the data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
