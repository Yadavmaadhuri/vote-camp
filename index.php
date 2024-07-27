<?php
  require_once("config/database.php");
  if(isset($_POST["register-btn"])){
    $su_crn = mysqli_real_escape_string($db,$_POST["$su_crn"]);
    $su_username = mysqli_real_escape_string($db,$_POST["$su_username"]);
    $su_password = mysqli_real_escape_string($db,$_POST["$su_password"]);
    $su_role ="voter";
    if($su_password==$_confirmpassword)   {
        mysqli_query($con,"INSERT INTO user(crn,username,faculty,batch,password,role)VALUES('".$su_crn."',
        '".$su_username."','".$su_password."','".$su_role."')")or die(mysqli_error($con)); 
    }
  }
?>


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
        <h2>Login</h2>
        <form action="submit_form.php" method="post">
            <label for="username">username:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
          
            <label for="crn">CRN Number:</label>
            <input type="text" id="crn" name="crn">

          
            <button type="submit" class="Login-btn">Login</button>
            <h6>Don't have an account?click here to <a href="register.php"><input type="button" class="register-btn" value="sign up"></b></a> </h6>
        </form>
    </div>
</body>  
</html>
