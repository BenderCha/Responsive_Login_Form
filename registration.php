<?php
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
    <title>Registration Form</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="title"><span>Registration</span></div>
            <div class="alert-danger text-center">
                <?php
                    if (isset($_SESSION['status'])) 
                    {
                        echo "<h3>".$_SESSION['status']."</h3>";
                        unset($_SESSION['status']);
                    }
                ?>
            </div>
            <form action="code_email.php" method="post">
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Name" class="user" name="name">
                </div>
                <div class="row">
                    <i class="icofont-email"></i>
                    <input type="email" placeholder="Email" class="email" name="email">
                </div>

                <div class="row">
                    <i class="icofont-lock"></i>
                    <input type="password" placeholder="Password" class="password" name="password">
                </div>
                <div class="row">
                    <i class="icofont-lock"></i>
                    <input type="password" placeholder="Password" class="password" name="password_2">
                </div>

                <div class="row button">
                    <input type="submit" value="Registration" name="register">
                    <div class="signup_link">I am registered<a href="login.php">Login Now</a></div>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>