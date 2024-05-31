<?php
global $conn;
include 'conn.php';

//**************************************************************/
//***************** Makale düzenleme işlemi ************************/
if (isset($_POST['update-article_submit'])) {
    $article_id = $_POST['article_id'];
    $title = $_POST['title'];
    $dis = $_POST['dis'];
    $img = $_POST['img'];

    $sql = "UPDATE articles 
            SET articles_name='$title', articles_content='$dis', img_cover='$img' 
            WHERE articles_id='$article_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/Admin_Pages/articlesList.php");
        exit();
    } else {
        echo  " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
//**************************************************************/
//***************** Olay düzenleme işlemi ************************/
if (isset($_POST['update_event-submit'])) {
    $event_id = $_POST['event_id'];
    $eventTitle = $_POST['name'];
    $dis = $_POST['dis'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $addres = $_POST['addres'];
    $lecturer = $_POST['lecturer'];
    $cover = $_POST['image'];

    $sql = "UPDATE events 
            SET event_name='$eventTitle', event_description='$dis', time='$time', date='$date', location='$addres', speaker_name='$lecturer', img_cover='$cover'  
            WHERE event_id='$event_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/Admin_Pages/EventsList.php");
        exit();
    } else {

    }
    mysqli_close($conn);
}
//**************************************************************/
//***************** Kurs düzenleme işlemi ************************/
if (isset($_POST['update-course-submit'])) {
    $course_id = $_POST['course_id'];
    $course_title = $_POST['name'];
    $course_description = $_POST['description'];

    if(isset($_FILES['course_image']) && !empty($_FILES['course_image']['name'])) {
        $new_image_name = $_FILES['course_image']['name'];
        $new_image_tmp = $_FILES['course_image']['tmp_name'];
        $new_image_size = $_FILES['course_image']['size'];
        $new_image_error = $_FILES['course_image']['error'];


        $upload_directory = "../uploads/";
        $new_image_path = $upload_directory . $new_image_name;
        move_uploaded_file($new_image_tmp, $new_image_path);

        $sql = "UPDATE courses 
                SET course_name='$course_title', course_description='$course_description', course_image='$new_image_path' 
                WHERE course_id='$course_id'";

    } else {
        $sql = "UPDATE courses 
                SET course_name='$course_title', course_description='$course_description' 
                WHERE course_id='$course_id'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
//***************** Ünite düzenleme işlemi ************************/
if (isset($_POST['update-unite-submit'])) {
    $unit_titles = $_POST['name'];
    $unit_id = $_POST['unit_id'];

    $sql = "UPDATE units 
            SET unit_name='$unit_titles' WHERE  unit_id ='$unit_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo  " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
//***************** Ders düzenleme işlemi ************************/
if (isset($_POST['update-lesson-submit'])) {
    $lesson_titles = $_POST['name'];
    $lesson_id = $_POST['lesson_id'];
    $unit_id = $_POST['unit_id'];

    $sql = "UPDATE lessons 
            SET lesson_name='$lesson_titles',unit_id = '$unit_id'
            WHERE  lesson_id ='$lesson_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/Admin_Pages/CoursesList.php");
        exit();
    } else {
        echo  " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
//**************************************************************/
//***************** Kullanıcı düzenleme işlemi ************************/
if (isset($_POST['update_user_submit'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST["role"];

    $sql = "UPDATE users 
            SET user_name = '$name', user_email= '$email', user_password= '$password', user_rol_id = '$role'
            WHERE user_id = '$user_id' ";

    if (mysqli_query($conn, $sql)) {
        header("Location: c/UserList.php");
        exit();
    } else {
        echo  " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}

