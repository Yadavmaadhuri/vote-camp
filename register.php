<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System Registration</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
    <?php
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>
        <h2>Register</h2>
          <form  action="validate.php" method="post">
           <label for="crn">CRN Number:</label>
           <input type="text" id="crn" name="crn">
           <span><?php if (!empty($crn_err)) echo "<div class='error'>$crn_err</div>"; ?></span>
           
           

            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
            <span><?php if (!empty($username_err)) echo "<div class='error'>$username_err</div>"; ?></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span><?php if (!empty($email_err)) echo "<div class='error'>$email_err</div>"; ?></span>

            <label for="faculty">Faculty:</label>
            <input type="text" id="faculty" name="faculty" required>
            <span><?php if (!empty($faculty_err)) echo "<div class='error'>$faculty_err</div>"; ?> </span>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
           <span> <?php if (!empty($password_err)) echo "<div class='error'>$password_err</div>"; ?></span>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span><?php if (!empty($confirmpassword_err)) echo "<div class='error'>$confirmpassword_err</div>"; ?></span>
            
            <!-- <label for="role">Role</label>
            <select name="role" id="role">
                <option>Admin</option>
                <option>User</option> -->
            </select>  
            <button type="submit" class="register-btn" value="Register">Register</button></br>
            <h6>already have an account? <a href="index.php"><input type="button" class="Login-btn" value="sign in"></button></a> </h6></h6>
        </form>
    </div>
</body>
</html>
