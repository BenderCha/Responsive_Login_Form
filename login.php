<?php
    session_start();
    include ("db.php");
    if (isset($_SESSION['authenticated']))
    {
        $_SESSION['status'] = "You are already Logged In";
        header("Location: dashboard.php");
        exit(0);
    }
?>
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
            <div class="title"><span>Login Form</span></div>
            <div class="alert-danger text-center">
                <?php
                    if (isset($_SESSION['status'])) 
                    {
                        echo "<h3>".$_SESSION['status']."</h3>";
                        unset($_SESSION['status']);
                    }
                ?>
            </div>
            <form action="logincode.php" method="post">
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Email" class="user" name="email">
                </div>
                <div class="row d-flex">
                    <i class="icofont-lock"></i>
                    <input type="password" placeholder="Password" class="password" name="password" id="password">
                    <img src="icofont/eye-close-4-32.png" id="eyeicon">
                </div>
                <div class="row button">
                   
                    <div class="pass"><a href="forgot.php">Forgot password?</a></div>
                    <input type="submit" value="Login" name="login_btn">
                    <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div>
                    
                </div>
            </form>
        </div>
    </div>
<script src="eye.js"></script>
</body>
</html>