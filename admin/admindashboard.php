
<?php
include_once '../config/database.php';
$sql = "SELECT * FROM candidates";
$result = mysqli_query($conn, $sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href='../assets/styles.css'>
</head>
<body>
    <div class="udcontainer">
    
    <nav class="navbar">
    <ul>
        <li><a href="admindashboard.php">Home</a></li>
        <li><a href="candidate.php">Add Candidate</a></li>
        <li><a href="result.php">Vote Management</a></li>
        <li><a href="adminlogout.php">Logout</li></a>
    </ul>
</nav>


        <h1>vote Here</h1>
        <div class="table-container">
            <div class="table-content">
                <table>
                    <thead>
                        <tr>
                            
                            <th style="text-align:center;">Candidates Name</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr> <td> <div class='candidates'>
                          <div class='candidate' style='width:90%;'>
                          <span class='candidate-name'>".$row['candidatename']."</span></td>
                        
                          </div>
            
                         </div>
                         </tr>";
                        }

                    }
                         ?>
                    </tbody>
                           
                    
     </table>           
    </div>  
    </div>
</body>
</html>

