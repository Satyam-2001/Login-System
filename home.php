<?php
    include 'database.php';
    session_start();
    $sql = "SELECT * FROM `users` WHERE username = '". $_SESSION["username"]."'" ;
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard | <?php echo $row["Name"] ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='home.css'>
    <link href="images/favicon.png" rel="icon" type="image/png" />
</head>
<body>

    <header>
        <img src="images/favicon.png" height="60px" width="60px" style="padding:15px;"/>
        <p id="heading">DASHBOARD</p>
        <div class="state">
            <form id="logout_form" action="index.php" method="post">
                <button id="logout">LOGOUT</button>
            </form>
        </div>
    </header>
    <div class="sidenav">
        <p style="font-family:verdana ">WELCOME <?php echo $row["Name"] ?></p>
        <a href="#">Profile</a>
        <a href="#">Users</a>
        <a href="#">About Us</a>
    </div>
    <div id = "container">
        <p class="title-name">PROFILE</p>
        <div id="profile">
            <ul>
                <li><p>Name : <p><?php echo $row['Name']?></li>
                <li><p>Username : <p><?php echo $row['Username']?></li>
                <li><p>Enrollment : <p><?php echo $row['Enrollment']?></li>
                <li><p>Department : <p><?php echo $row['Department']?></li>
                <li><p>Phone : <p><?php echo $row['Phone']?></li>
            </ul>
        </div>
    </div>

</body>
</html>