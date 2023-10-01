<?php
    session_start();
    include ('db.php');
    if (isset($_GET['token']))
    {
        $token = $_GET['token'];
        $verify_query = "SELECT verify_token,verify_status FROM users WHERE verify_token='$token' LIMIT 1";
        $verify_query_run = mysqli_query($db, $verify_query);
        if (mysqli_num_rows($verify_query_run) > 0)
        {
            $row = mysqli_fetch_array($verify_query_run);
            if ($row['verify_status'] == "0")
            {
                $click_token = $row['verify_token'];
                $update_token = "UPDATE users SET verify_status='1' WHERE verify_token = '$click_token' LIMIT 1";
                $update_token_run = mysqli_query($db, $update_token);
                if ($update_token_run)
                {
                    $_SESSION['status'] = "Your Account has been verified Successfull...!";
                    header("Location: login.php");
                    exit(0);
                } else {
                    $_SESSION['status'] = "Verification Fielid...!";
                    header("Location: login.php");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "Email Already Verified. Plase Login";
                header("Location: login.php"); 
                exit(0);
            }
        } else {
            $_SESSION['status'] = "This Token does not Exists";
            header("Location: login.php");
        }

    } else {
        $_SESSION['status'] = "Not Allowed";
        header("Location: login.php");
    }

?>