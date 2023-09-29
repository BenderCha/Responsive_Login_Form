<?php
    session_start();
    if (!isset($_SESSION['name'])) 
    {
        header("Location: login.php");
    }

?>

<h1>
    
    
</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icofont/icofont.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="title"><span>Dashboard</span></div>
            <form>
                <div class="row">
                    <i class="icofont-user"></i>
                    <div class="login_name"><?php echo $_SESSION['name'];?></div>
                </div>
                <div class="row">
                    <div class="rowpass">
                    <i class="icofont-lock"></i>
                        <input type="password" placeholder="Password" class="password" id="password" name="password">
                        <img src="icofont/eye-close-4-32.png" id="eyeicon">
                    </div>
                </div>
                <div class="row button">
                    <div class="pass"><a href="forgot.html">Forgot password?</a></div>
                    <div class="buttons"><a href="logout.php">Logout</a></div>
                    <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div>
                </div>
            </form>
        </div>
    </div>
<script src="eye.js"></script>
</body>
</html>
