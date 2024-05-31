<?php

session_start();
session_destroy();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
header("Location: ../pages/Login_Signup/loginpage.php");

exit();
