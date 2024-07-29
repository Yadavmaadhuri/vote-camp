<?php
include 'config/database.php';
function login($crn,$username, $password){
    //$conn = connect();
    $sql = "SELECT * FROM users WHERE  crn='$crn'AND username='$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['crn'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        return true;
    }
    else{
        return false;
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vote-camp user login</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
           <label for="crn">CRN Number:</label>
            <input type="text" id="crn" name="crn" required>
            <label for="username">username:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            

          
        <button type="submit" class="Login-btn"  >Login</button>
        <h6>Don't have an account?click here to <a href="register.php"><input type="button" class="register-btn" value="sign up"></b></a> </h6>
        </form>
    </div>
</body>  
</html>
