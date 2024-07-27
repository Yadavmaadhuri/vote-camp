
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
          <form  action="storeuser.php" method="post">
           <label for="crn">CRN Number:</label>
           <input type="text" id="crn" name="crn">

            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
        
            <label for="faculty">Faculty:</label>
            <input type="text" id="faculty" name="faculty" required>

            <label for="batch">Batch:</label>
            <input type="text" id="batch" name="batch" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <label for="role">Role</label>
            <select name="role" id="role">
                <option>Admin</option>
                <option>User</option>
            </select>  
            <input type="submit" class="register-btn" value="Register">
            <h6>already have an account? <a href="index.php"><input type="submit" class="register-btn" value="sign in"></b></a> </h6></h6>
        </form>
    </div>
</body>
</html>
