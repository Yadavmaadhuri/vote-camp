<?php
include 'config/database.php';
?>
<?php
    
    // Define variables and initialize with empty values
    $crn = $username = $email  = $password = $confirm_password = "";
    $crn_err = $username_err = $email_err  = $password_err = $confirmpassword_err = "";
    
    // Process form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validate CRN
        if (empty(trim($_POST["crn"]))) {
            $crn_err = "Please enter your CRN number.";
        } else {
            $crn = trim($_POST["crn"]);
        }
        
        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $username = trim($_POST["username"]);
        }
        
        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter your email.";
        } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        } else {
            $email = trim($_POST["email"]);
        }
        
        
        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirmpassword_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirmpassword_err = "Password did not match.";
            }
            else{
                $sql = "INSERT INTO users VALUES ('$crn','$username', '$email','$password')";
      
          
                if(mysqli_query($conn, $sql)){
                echo "<h3>data stored in a database successfully." 
                 . " Please browse your localhost php my admin" 
                 . " to view the updated data</h3>"; 

      }        else{
               echo "ERROR: Hush! Sorry $sql. " 
               . mysqli_error($conn);
      }
      
      // Close connection
      mysqli_close($conn);
      

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
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .error{ color: brown;}
    </style>
   
</head>
<body>
    
    <div class="container">
        <h2>Register</h2>
          <p><span class="error"> *required field</span></p>
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
           <label for="crn">CRN Number:</label>
           <input type="text" id="crn" name="crn">
           <span class="error"><?php echo $crn_err; ?></span>
           
           

            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
            <span class="error"><?php echo $username_err; ?></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error"><?php echo $email_err; ?></span>

            
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="error"><?php echo $password_err; ?></span>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span class="error"><?php echo $confirmpassword_err; ?></span>
             
            <button type="submit" class="register-btn" value="Register">Register</button></br>
            <h6>already have an account? <a href="index.php"><input type="button" class="Login-btn" value="sign in"></button></a> </h6></h6>
        </form>
    </div>
</body>
</html>
