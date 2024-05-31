<?php
global $conn;
include 'conn.php';

//***************** Makale silme işlemi ************************/
if (isset($_GET['article_id'])) {
    $articleId = $_GET['article_id'];

    $sql = "DELETE FROM articles WHERE articles_id = $articleId";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo " " . mysqli_error($conn);
    }
} else {
    echo "";
}
//**************************************************************/
//***************** Olay silme işlemi ************************/
if (isset($_GET['event_id'])) {
    $eventId = $_GET['event_id'];
    $sql = "DELETE FROM events WHERE event_id = $eventId";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "";
    }
} else {
    echo "";
}
//**************************************************************/
//***************** Kurs silme işlemi ************************/
if (isset($_GET['course_id'])) {
    $couresId = $_GET['course_id'];
    $sql = "DELETE FROM courses WHERE course_id = $couresId";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "";
    }
} else {
    echo "";
}
//***************** Ünite silme işlemi ************************/
if (isset($_GET['unit_id'])) {
    $unit_id = $_GET['unit_id'];
    $sql = "DELETE FROM units WHERE unit_id = $unit_id";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "";
    }
} else {
    echo "";
}
//***************** Ders silme işlemi ************************/
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];
    $sql = "DELETE FROM lessons WHERE lesson_id = $lesson_id";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "";
    }
} else {
    echo "";
}
//**************************************************************/
//***************** Kullanıcı silme işlemi ************************/

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    $sql = "DELETE FROM users WHERE user_id = $userId";

    // تنفيذ الاستعلام
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "";
    }
} else {
    echo "";
}
//**************************************************************/
mysqli_close($conn);
