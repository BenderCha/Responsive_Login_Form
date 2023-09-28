<?php
    session_start();
    include_once ('db.php');
 
        
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
            
            <form action="registration.php" method="post">
            <?php include('errors.php'); ?>
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Name" class="user" name="name" value="<?php echo $name?>">
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