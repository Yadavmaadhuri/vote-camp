<?php
  require_once("config/database.php");
  if(isset($_POST["register-btn"])){
    $su_crn = mysqli_real_escape_string($db,$_POST["$su_crn"]);
    $su_username = mysqli_real_escape_string($db,$_POST["$su_username"]);
    $su_faculty = mysqli_real_escape_string($db,$_POST["$su_faculty"]);
    $su_batch= mysqli_real_escape_string($db,$_POST["$su_batch"]);
    $su_password = mysqli_real_escape_string($db,$_POST["$su_password"]);
    $su_confirmpassword = mysqli_real_escape_string($db,$_POST["$_confirmpassword"]);
    $su_role ="voter";
    if($su_password==$_confirmpassword)   {
        mysqli_query($con,"INSERT INTO users(crn,username,faculty,batch,password,role)VALUES('".$su_crn."',
        '".$su_username."','".$su_faculty."','".$su_batch."','".$su_password."','".$su_role."')")or die(mysqli_error($con));
    }
  }
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
          <fo  action="validate.php" method="post">
           <label for="crn">CRN Number:</label>
           <input type="text" id="crn" name="crn">

            <label for="username">username:</label>
            <input type="text" id="fname" name="fname" required>
        
            <label for="faculty">Faculty:</label>
            <input type="text" id="faculty" name="faculty" required>

            <label for="batch">Batch:</label>
            <input type="text" id="batch" name="batch" required>

            <!-- <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br><br> -->
            

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
            <h6>alresdy have an account? <a href="index.php"><input type="button" class="register-btn" value="sign in"></b></a> </h6></h6>
        </form>
    </div>
</body>
</html>
