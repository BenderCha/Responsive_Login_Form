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
            <form method="POST" action="send-password-reset.php">
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Email and Phone" class="user" name="reset_password">
                </div>
               
                <div class="row button">
                    <div class="pass text-center"><a href="login.php">Login Now</a> || <a href="resend-email-verification.php">Resend</a></div>
                    <input type="submit" value="Reset">
                    <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div>
                </div>
                
            </form>
            <!-- <div class="signup_link">Did not recieve your Verification Email? <a href="resend-email-verification.php">Resend</a></div> -->
        </div>
    </div>
    
</body>
</html>