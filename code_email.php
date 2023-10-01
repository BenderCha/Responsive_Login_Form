<?php

session_start();
include ("db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP(); 
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'smartttik@gmail.com';
    $mail->Password   = 'jksadhjkhsadkjhsa'; //app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('smartttik@gmail.com',$name);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Email verification Spaces.Uz';
    $mail_template = "<p>This is the HTML message body </p><br/><br/>
    <a href='http://registration/email_verify.php?token=$verify_token'>Click Me</a>";
    $mail->Body    = $mail_template;
    $mail->send();
    // echo "Message has been sent";

}
if (isset($_POST['register'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    $email_check = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $email_check_run = mysqli_query($db, $email_check);

    if (mysqli_num_rows($email_check_run) > 0)
    {
        $_SESSION['status'] = "Email Id already Exists";
        header("Location: registration.php");
    } else {
        $insert_query = "INSERT INTO users(name,email,password,verify_token) VALUES('$name','$email','$password','$verify_token')";
        $insert_query_run = mysqli_query($db,$insert_query);
        if ($insert_query_run)
        {
            sendemail_verify("$name","$email","$verify_token");
            $_SESSION['status'] = "Registration Successfull.! Plase verify your Email";
            header("Location: registration.php");   
        } else {
            $_SESSION['status'] = "Registration Failed";
            header("Location: registration.php");
        }

    }

}


