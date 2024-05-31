<?php
global $conn;
session_start();
include 'conn.php';

if(isset($_SESSION['user_id']) && isset($_GET['course_id'])) {
    $user_id = $_SESSION['user_id'];
    $course_id = $_GET['course_id'];

    $check_sql = "SELECT * FROM registered_courses WHERE user_id = '$user_id' AND course_id = '$course_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if(mysqli_num_rows($check_result) > 0) {
        echo '<script>
        window.onload = function() {
            var message = "Bu derse zaten kaydoldunuz.";
            alert(message);
            window.location.href = "../pages/Course_Pages/mycoureses.php";
    };
    </script>';
    } else {

        $insert_sql = "INSERT INTO registered_courses (user_id, course_id) VALUES ('$user_id', '$course_id')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if($insert_result) {
            header("Location: ../pages/Course_Pages/mycoureses.php");
        } else {
            echo "حدث خطأ أثناء تسجيل الدخول في الدرس: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: ../pages/Login_Signup/loginpage.php");
}

mysqli_close($conn);

