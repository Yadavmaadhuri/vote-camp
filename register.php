<?php
include 'config/database.php';

// Define variables and initialize with empty values
$crn = $username  = $password =  $batch = $faculty = $confirm_password = "";
$crn_err = $username_err  = $batch_err = $faculty_err = $password_err = $confirmpassword_err = "";



    // Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
                    $stmt = mysqli_prepare($conn, $sql);
                    if ($stmt) {
                        // Bind the parameters
                        mysqli_stmt_bind_param($stmt, "s", $crn);

                        mysqli_stmt_execute($stmt);
                        
                        // Store the result
                        mysqli_stmt_store_result($stmt);
                        
                        // Check if CRN already exists
                        if (mysqli_stmt_num_rows($stmt) > 0) {
                            $crn_err = "CRN already exists.";
                        }
                        
                        mysqli_stmt_close($stmt);
                    }

    }
}

    // Validate batch and faculty based on CRN
    if (empty($crn_err)) {

        $batch = $_POST["batch"];
        $faculty = $_POST["faculty"];

        // for BIM

        if ($crn >= 13939 && $crn <= 13960) {
            if ($batch !== "2078" || $faculty !== "BIM") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BIM.";
            }
        }elseif ($crn >= 13961 && $crn <= 13980) {
                if ($batch !== "2079" || $faculty !== "BIM") {
                    $batch_err = "Invalid batch or faculty for the given CRN.";
                    $faculty_err = "You can only select Batch 2079 and Faculty BIM.";
                }
                        
         }elseif ($crn >= 13981 && $crn <= 13999) {
                if ($batch !== "2080" || $faculty !== "BIM") {
                    $batch_err = "Invalid batch or faculty for the given CRN.";
                    $faculty_err = "You can only select Batch 2080 and Faculty BIM.";
                }



            // for BCA
    
        } elseif ($crn >= 14939 && $crn <= 14960) {
            if ($batch !== "2078" || $faculty !== "BCA") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BCA.";
            }
        } elseif ($crn >= 14961 && $crn <= 14980) {
            if ($batch !== "2079" || $faculty !== "BCA") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2079 and Faculty BCA.";
            }
        } elseif ($crn >= 14981 && $crn <= 14999) {
            if ($batch !== "2080" || $faculty !== "BCA") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2080 and Faculty BCA.";
            }



        //     // for bs.csit



        } elseif ($crn >= 15939 && $crn <= 15960) {
            if ($batch !== "2078" || $faculty !== "BSCCSIT") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BSCCSIT.";
            }
        } elseif ($crn >= 15961 && $crn <= 15980) {
            if ($batch !== "2079" || $faculty !== "BSCCSIT") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2079 and Faculty BSCCSIT.";
            }
        } elseif ($crn >= 15981 && $crn <= 15999) {
            if ($batch !== "2080" || $faculty !== "BSCCSIT") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2080 and Faculty BSCCSIT.";
            }
            //     // for bHM
        } elseif ($crn >= 16939 && $crn <= 16960) {
            if ($batch !== "2078" || $faculty !== "BHM") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BHM.";
            }
        } elseif ($crn >= 16961 && $crn <= 16980) {
            if ($batch !== "2079" || $faculty !== "BHM") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BHM.";
            }
            
        } elseif ($crn >= 16981 && $crn <= 16999) {
            if ($batch !== "2080" || $faculty !== "BHM") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2080 and FacultyBHM.";
            }
        //    FOR BBS
        } elseif ($crn >= 17939 && $crn <= 17960) {
            if ($batch !== "2078" || $faculty !== "BBS") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2078 and Faculty BBS.";
            }
        } elseif ($crn >= 17961 && $crn <= 17980) {
            if ($batch !== "2079" || $faculty !== "BBS") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2079 and Faculty BBS.";
            }
        } elseif ($crn >= 17981 && $crn <= 17999) {
            if ($batch !== "2080" || $faculty !== "BBS") {
                $batch_err = "Invalid batch or faculty for the given CRN.";
                $faculty_err = "You can only select Batch 2080 and FacultyBBS.";
            }
           
        


        } else {
            $crn_err = "Invalid CRN range.";
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
    // Validate batch
    if (empty($_POST["batch"])) {
        $batch_err = "Please select a batch.";
    } else {
        $batch = $_POST["batch"];
        if (!in_array($batch, ["2078", "2079", "2080"])) {
            $batch_err = "Invalid batch selected.";
        }
    }

    // Validate faculty
    if (empty($_POST["faculty"])) {
        $faculty_err = "Please select a faculty.";
    } else {
        $faculty = $_POST["faculty"];
        $valid_faculties = [ "BIM", "BCA", "B.SC CSIT", "BHM","BBS"];
        if (!in_array($faculty, $valid_faculties)) {
            $faculty_err = "Invalid faculty selected.";
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 4) {
        $password_err = "Password must have at least 4 characters.";
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
    if (empty($crn_err) && empty($username_err) && empty($batch_err) && empty($faculty_err)  && empty($password_err) && empty($confirmpassword_err)) {
        $crn = $_POST['crn'];
        $username = $_POST['username'];
        $userpassword = $_POST['password'];
        $batch= $_POST['batch'];
        $faculty=$_POST['faculty'];

        $sql = "INSERT INTO users VALUES ('$crn','$username','$batch','$faculty', '$userpassword')";

        if (mysqli_query($conn, $sql)) {
            header('Location: login.php');
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
      
    <div class="reg-container">
    <img src="assets/hdclogo.png">
            <h2>Register</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <label for="crn">CRN Number:<span style="color:red">*</span></label>
                <input type="number" id="crn" name="crn" required>
                <span class="error"><?php echo $crn_err; ?></span>
            
                <label for="username">Username:<span style="color:red">*</span></label>
                <input type="text" id="username" name="username" required>
                <span class="error"><?php echo $username_err; ?></span>

                <label for="batch">Batch:</label>
                <select name="batch" id="batch" required>
                   <option value="2078">2078</option>
                   <option value="2079">2079</option>
                   <option value="2080">2080</option>
                 </select>
                 <span class="error"><?php echo $batch_err; ?></span>

                <label for="faculty">Faculty:</label>
                <select name="faculty" id="faculty" required>
                  
                   <option value="BIM">BIM</option>
                   <option value="BCA">BCA</option>
                   <option value="B.SC CSIT">B.SC CSIT</option>
                   <option value="BHM">BHM</option>
                   <option value="BBS">BBS</option>
                 </select>
                 <span class="error"><?php echo $faculty_err; ?></span>

                 

                <label for="password">New Password:<span style="color:red">*</span></label>
                <input type="password" id="password" name="password" required>
                <span class="error"><?php echo $password_err; ?></span>

                <label for="confirm_password">Confirm Password:<span style="color:red">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span class="error"><?php echo $confirmpassword_err; ?></span>

                <button type="submit" class="register-btn" value="Register">Register</button><br>
                <p>Already have an account? <a href="login.php">SignIn</a></p>
           
        </form>
    </div>
</body>
</html>
