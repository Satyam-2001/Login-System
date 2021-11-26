<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'database.php';
    $name  =$_POST['name'];
    $username  =$_POST['username'];
    $password  =$_POST['password'];
    $enrl  =$_POST['enrollment'];
    $dept  =$_POST['department'];
    $phn   =$_POST['phone'];
    $error = false;

    $sql = "INSERT INTO `users` (`Name`, `Username`, `Password`, `Enrollment`, `Department`, `Phone`) 
    VALUES ('$name', '$username', '$password', '$enrl', '$dept', '$phn')";
    $result = mysqli_query($con,$sql);

    if($result){
        session_start();
        $_SESSION["username"] = $username;
        header("location: home.php");
    }
    else{
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login | IIEST</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link href="images/favicon.png" rel="icon" type="image/png" />
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="register.php" method="post">
                <h1>Create Account</h1>
                <?php
                 if($error == true){
                     echo "<p style='color:red'>Connection Failed : Try Again<p\>";
                 }
                ?>
                <input name="name" type="text" placeholder="Name" required/>
                <input name="username" type="text" placeholder="Username" required/>
                <input name="password" type="password" placeholder="Password" required/>
                <input name="enrollment" type="text" placeholder="Enrollment" required/>
                <input name="department" type="text" placeholder="Department" required/>
                <input name="phone" type="tel" placeholder="Phone" required/>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="validation.php" method="post">
                <h1 style="padding-bottom:40px;">Sign in</h1>
                <input type="text" name="username" placeholder="Username" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <button style="margin-top:40px;">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="images/front.png" width="130px" height="100px" />
                    <h1>REGISTER</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="images/front.png" width="130px" height="100px" />
                    <h1>LOGIN</h1>
                    <p>Enter your personal details and start journey with iiest</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://www.instagram.com/satyam.lohiya/">Satyam Lohiya</a>
            - Check out my other projects
            <a target="_blank" href="https://github.com/Satyam-2001">here</a>.
        </p>
    </footer>
</body>
<script src="main.js"></script>
</html>