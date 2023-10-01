<?php
session_start();
include ("db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function resend_email_verify($name,$email,$verify_token)
{
    $mail = new PHPMailer(true);
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
    $mail->Subject = 'Resend Email verification Spaces.Uz';
    $mail_template = "<p>This is the HTML message body </p><br/><br/>
    <a href='http://registration/email_verify.php?token=$verify_token'>Click Me</a>";
    $mail->Body    = $mail_template;
    $mail->send();

}
if(isset($_POST['resend_email_verify_btn']))
{
    if (!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($db,$_POST['email']);        
        $checkemail_query = "SELECT * FROM users WHERE email='$email' LIMIT 1"; 
        $checkemail_query_run = mysqli_query($db,$checkemail_query);

        if (mysqli_num_rows($checkemail_query_run) > 0)
        {
            $row = mysqli_fetch_array($checkemail_query_run);
            if ($row['verify_status'] == "0")
            {
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];
                resend_email_verify($name,$email,$verify_token);
                $_SESSION['status'] = "Verification Email Link has been sent to your email address..!";
                header("Location: login.php");
                exit(0);

            } else {
                $_SESSION['status'] = "Email already verified. Please login..!";
                header("Location: resend-email-verification.php");
                exit(0);                
            }
        } else {
            $_SESSION['status'] = "Email not registered. Please Register Now...!";
            header("Location: registration.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Please enter the email field...!";
        header("Location: resend-email-verification.php");
        exit(0);
    }
}
?>