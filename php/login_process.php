<?php
session_start();
global $conn;
include('../php/conn.php');

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password =  $_POST["password"];

    $sql = "SELECT * FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['user_password'] === $password) {

            if ($row['user_rol_id'] == 1) {
                $_SESSION['role'] = 'admin';
                header("Location: ../pages/Admin_Pages/Dashboard.php");
                exit();
            } else {
                $_SESSION['role'] = 'user';
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['user_name'];
                header("Location: ../pages/Main_Pages/home.php");
                exit();
            }
        } else {
            $_SESSION['password_error'] = 'Şifre yanlış';
            header("Location: ../pages/Login_Signup/loginpage.php");
            exit();
        }
    } else {
        $_SESSION['email_error'] = 'E-posta yanlış ';
        header("Location: ../pages/Login_Signup/loginpage.php");
        exit();
    }
}
