<?php
session_start();
global $conn;
include '../php/conn.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // التحقق من قوة كلمة المرور
    if (strlen($password) < 8) {
        $_SESSION['password_error'] = "Şifre en az 8 karakter içermelidir";
    } elseif (!preg_match('/[A-Za-z]/', $password)) {
        $_SESSION['password_error'] = "Şifre harfler içermelidir";
    } elseif (!preg_match('/\d/', $password)) {
        $_SESSION['password_error'] = "Şifre sayı içermelidir";
    } else {
        // تحقق مما إذا كان البريد الإلكتروني مستخدمًا بالفعل
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $_SESSION['email_error'] = "E-posta zaten kullanımda";
        } else {
            // قم بإدخال بيانات المستخدم الجديدة إلى جدول المستخدمين
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // إذا تمت الإضافة بنجاح، قم بتسجيل الدخول للمستخدم المنشأ وتوجيهه إلى الصفحة المناسبة
                $id = mysqli_insert_id($conn);
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $name;
                header("Location: ../pages/home.php");
                exit();
            } else {
                $_SESSION['error'] = "Hesap oluşturulurken bir hata oluştu, lütfen tekrar deneyin";
            }
        }
    }

    header("Location: ../pages/signuppage.php");
    exit();
}
?>
