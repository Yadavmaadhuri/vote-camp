<?php

?>

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
        <h2>Register</h2>
          <form  action="submit_form.php" method="post">
            <label for="username">username:</label>
            <input type="text" id="fname" name="fname" required>
            

            <label for="faculty">Faculty:</label>
            <input type="text" id="faculty" name="faculty" required>

            <label for="batch">Batch:</label>
            <input type="text" id="batch" name="batch" required>

            <label for="crn">CRN Number:</label>
            <input type="text" id="crn" name="crn">
            
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br><br>
            

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <label for="role">Role</label>
            <select name="role" id="role">
                <option>Admin</option>
                <option>User</option>
            </select>  
            <input type="button" class="register-btn" value="Register">
        </form>
    </div>
</body>
</html>
