<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        include('config/database.php');
        // Taking all  values from the form data(input)
        
    $crn =  $_REQUEST['crn'];
    $username=  $_REQUEST['username'];
    $faculty =  $_REQUEST['faculty'];
    $batch=  $_REQUEST['batch'];
    $password =  $_REQUEST['password'];
    //$confirmpassword =  $_REQUEST['confirmpassword'];
    $role=$_REQUEST['role'];
        
        
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO users VALUES ('$username', 
            '$faculty','$batch','$crn','$password','$role')";
        
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
        ?>
    </center>
</body>

</html>