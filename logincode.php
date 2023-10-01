<?php
session_start();
include ("db.php");
    if (isset($_POST['login_btn']))
    {
        if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
        {
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password = mysqli_real_escape_string($db, $_POST['password']);

            $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $login_query_run = mysqli_query($db, $login_query);

            if (mysqli_num_rows($login_query_run) > 0)
            {
                $row = mysqli_fetch_array($login_query_run);
                // echo $row['verify_status'];
                if ($row['verify_status'] == "1")
                {
                   $_SESSION['authenticated'] = TRUE;
                   $_SESSION['auth_user'] = [
                        'username' => $row['name'],
                        'email' => $row['email'],
                        'password' => $row['password'],
                   ];
                   $_SESSION['status'] = "You are Logged In Successfully...!";
                   header("Location: dashboard.php");
                   exit(0);
                }
                // } else {
                //     $_SESSION['status'] = "Plase verify your Email Adress to Login.";
                //     header("Location: login.php");
                //     exit(0);
                // }
            } else {
                $_SESSION['status'] = "Invalide email or password";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "All fields are Mandetory";
            header("Location: login.php");
            exit(0);
        } 
    }
?>