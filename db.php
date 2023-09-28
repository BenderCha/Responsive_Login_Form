<?php
session_start();

$name = "";
$password = "";
$errors = array(); 
$db = mysqli_connect("localhost","root","","register");
   
    if (isset($_POST['register'])) 
    {
        $name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name'], ENT_QUOTES));
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if (empty($name)) 
        { 
            array_push($errors, "Foydalanuvchi ismini to'ldiring");
        }
        if ($name<3) 
        { 
            array_push($errors, "Foydalanuvchi ismi 3ta belgidan kam bo'lmasligi kerak");
        }
        if (empty($password)) 
        { 
            array_push($errors, "Foydalanuvchi parolini to'ldiring");
        }
        if($password<6)
        {
            array_push($errors, "Foydalanuvchi paroli 6 ta belgidan kam bo'lmasligi kerak");
        }
        if ($password != $password_2) 
        {
            array_push($errors, "Ikkita parol bir xil emas");
        }
        $name_check = "SELECT * FROM `users` WHERE name='$name'";
        $result = mysqli_query($db, $name_check);
        $user = mysqli_fetch_assoc($result);
        
        if($user)
        {
            if ($user['name'] === $name) 
            {
                array_push($errors, "Ushbu nickdagi foydalanuvchi avval ro'yhatdan o'tgan...!");
            }
        }
        
        if(count($errors)==0)
        {
            $password_hash = md5($password);

            $sql = "INSERT INTO `users` (name,password) VALUES('$name','$password_hash')";
            mysqli_query($db,$sql);
            // $_SESSION['name'] = $name;
            // $_SESSION['success'] = "Siz hozir tizimga kirishingiz mumkin.";
            // header('location: login.php');

        }
    }
?>