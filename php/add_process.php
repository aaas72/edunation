<?php
global $conn;
include 'conn.php';

//***************** Kurs ekleme işlemi ************************/
if(isset($_POST['add-course-submit'])) {
    $course_title = $_POST['name'];
    $course_description = $_POST['description'];
    $course_image = $_POST['image'];

    $sql = "INSERT INTO courses (course_name, course_description, course_image) VALUES ('$course_title', '$course_description','$course_image')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo "حدث خطأ أثناء إضافة البيانات.";
    }
}
//***************** unite ekleme işlemi ************************/
if(isset($_POST['add-unite-submit'])) {
    $unit_titles = $_POST['name'];
    $course_id = $_POST['course-id'];

    $sql = "INSERT INTO units (unit_name ,course_id) VALUES ('$unit_titles','$course_id')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo "حدث خطأ أثناء إضافة الوحدة: " . mysqli_error($conn);
    }
}
//***************** Ders ekleme işlemi ************************/
if (isset($_POST['add-lesson-submit'])) {
    $lesson_title = ($_POST['name']);
    $lesson_description = ($_POST['description']);
    $lesson_link = ($_POST['link']);
    $unit_id = ($_POST['unite_id']);

    $sql = "INSERT INTO lessons (lesson_name,lesson_description, unit_id ,video_url) 
            VALUES ('$lesson_title','$lesson_description', $unit_id , '$lesson_link')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo "فشل في إضافة الدرس.";
    }
}
//**************************************************************/
//***************** Makale ekleme işlemi ************************/
if (isset($_POST["add-article_submit"])) {
    $title = $_POST['name'];
    $dis = mysqli_real_escape_string($conn, $_POST['description']);
    $img = $_POST['image'];

    $sql = "INSERT INTO articles (articles_name, articles_content, img_cover) VALUES ('$title', '$dis', '$img')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../pages/Admin_Pages/articlesList.php");

    } else {
        echo("Error: " . mysqli_error($conn));
    }
}
//**************************************************************/
//***************** Olay ekleme işlemi ************************/
if (isset($_POST["add-event_submit"])) {
    $title = $_POST['name'];
    $dis = $_POST['description'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $addres = $_POST['addres'];
    $lecturer = $_POST['lecturer'];
    $cover = $_POST['image'];

    $sql = "INSERT INTO events (event_name, event_description, time, date, location, speaker_name, img_cover) VALUES ('$title', '$dis', '$time','$date','$addres','$lecturer','$cover')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../pages/Admin_Pages/EventsList.php");
    } else {
        echo("Error: " . mysqli_error($conn));
    }
}
//**************************************************************/

//***************** Kullanıcı ekleme işlemi ***********************
if (isset($_POST["add-user_submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];  // يفترض أن يحتوي على role_id الآن

    $sql = "INSERT INTO users (user_name, user_email, user_password, user_rol_id) VALUES ('$name', '$email', '$password', $role)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../pages/Admin_Pages/UserList.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
