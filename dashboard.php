<?php
    include ("authentication.php");
    session_start();
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
            <div class="title"><span>Dashboard</span></div>
            <div class="row text-center">
                    <h2>User Dashboard</h4>
                    <h3>Access when you are Logged IN</h3>
                </div>
            <form>
                <div class="row">
                    <i class="icofont-user"></i>
                    <div class="login_name"><?php echo $_SESSION['auth_user']['username'];?></div>
                </div>
                <div class="row">
                    <i class="icofont-email"></i>
                    <div class="login_name"><?php echo $_SESSION['auth_user']['email'];?></div>
                </div>
                 <div class="row d-flex">
                    <i class="icofont-lock"></i>
                    <input type="password" placeholder="<?php echo $_SESSION['auth_user']['password'];?>" class="password" id="password" name="password" value="<?php echo $_SESSION['auth_user']['password'];?>">
                    <img src="icofont/eye-close-4-32.png" id="eyeicon">
                </div>
                <div class="row button">
                    <!-- <div class="pass"><a href="forgot.html">Forgot password?</a></div> -->
                    <div class="buttons"><a href="logout.php">Logout</a></div>

                    <!-- <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div> -->
                </div> 
            </form>
        </div>
    </div>

<script src="eye.js"></script>
</body>
</html>
