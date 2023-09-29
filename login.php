<?php
$login = 0;
$invalid = 0;
    if (isset($_POST['login_btn'])) {
            include_once ('db.php');
            $name = $_POST['name'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `users` WHERE name='$name' AND password='$password'";
            $result = mysqli_query($db,$sql);
            if ($result)
            {
                $num = mysqli_num_rows($result);
                if ($num>0) {
                    echo $login = 1;
                    session_start();
                    $_SESSION['name'] = $name;
                    header("Location: dashboard.php");
                } else {
                    // echo "Bazada foydalanuvchi mavjud emas";
                    echo $invalid = 1;
                }
            }
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
            <form action="login.php" method="post">
                <?php 
                if ($login) {
                    echo "Foydalanuvchi tizimga kirgan";
                }
                if ($invalid) {
                    echo "Foydalanuvchi tizimga kirmagan";
                }
                ?>
                <div class="row">
                    <i class="icofont-user"></i>
                    <input type="text" placeholder="Email and Phone" class="user" name="name">
                </div>
                <div class="row">
                    <i class="icofont-lock"></i>
                    <input type="password" placeholder="Password" class="password" name="password">
                </div>
                <div class="row button">
                   
                    <div class="pass"><a href="forgot.php">Forgot password?</a></div>
                    <input type="submit" value="Login" name="login_btn">
                    <div class="signup_link">Not a member? <a href="registration.php">Signup Now</a></div>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>