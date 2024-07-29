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
    <a href="adminlogin.php"> <input type="button" class="logout-btn" value="Logout"> </a>
    <nav class="navbar">
    <ul>
        <li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=candidate">Candidate Management</a></li>
        <li><a href="index.php?page=vote">Vote Management</a></li>
        <li><a href="index.php?page=logout">Logout</li></a>
    </ul>
</nav>


        <h1>vote Here</h1>
        <div class="candidates">
            <div class="candidate">
                <span class="candidate-name">Sarthak</span>
                <button class="vote-btn">Vote</button>
            </div>
            <div class="candidate">
                <span class="candidate-name">Mahesh</span>
                <button class="vote-btn">Vote</button>
            </div>
            <div class="candidate">
                <span class="candidate-name">Amogh</span>
                <button class="vote-btn">Vote</button>
            </div>
            <!-- Add more candidates as needed -->
        </div>
    </div>
</body>
</html>

