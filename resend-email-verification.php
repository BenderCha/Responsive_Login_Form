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
            <form method="POST" action="resend-code.php">
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Email and Phone" class="user" name="email">
                </div>
               
                <div class="row button">
                    <div class="pass"><a href="login.php">Login Now</a></div>
                    <input type="submit" value="Resend" name="resend_email_verify_btn">
                    <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div>
                </div>
                
            </form>
            
        </div>
    </div>
    
</body>
</html>