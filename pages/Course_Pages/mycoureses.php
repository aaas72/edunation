<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kurslarım</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../css/coureslist.css">
    <link rel="stylesheet" href="../../css/EnentPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar">
    <div class="container-navbar">
        <div class="nav-row">
            <ul class="logo">
                <li>EduNation</li>
            </ul>
            <ul class="list">
                <li><a id="home-page">ِAna Sayfa</a></li>
                <li> <a id="coures-page">Kurslar</a></li>
                <li> <a id="articles-page">Makaleler</a></li>
                <li><a id="events-page">Olaylar</a></li>
                <li><a id="contact-page">Bize Ulaşın</a></li>
            </ul>
            <ul class="buttons">
                <li class="but">
                </li>
                <li class="acc" id="icon">
                    <i class="fa-regular fa-user "></i>
                </li>
            </ul>
        </div>
        <div class="account" id="acco">
            <ul class="personel-info">
                <li id="my-course"><i class="fa-regular fa-bookmark fa-md"></i>Kurslarim</li>
                <li id="log-out"><i class="fa-solid fa-arrow-right-from-bracket"></i>Çıkış Yap</li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-coures-list">
    <div class="coures-list-boxs">
        <?php
        global $conn;
        include '../../php/conn.php';

        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            $sql = "SELECT registered_courses.*, courses.course_name, courses.course_image 
                    FROM registered_courses 
                    JOIN courses  ON registered_courses.course_id = courses.course_id
                    WHERE registered_courses.user_id = '$user_id'";


            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="box">';
                    $imageData = base64_encode($row['course_image']);
                    $src = 'data:image/jpeg;base64,' . $imageData;
                    echo '<img src="'. $src . '" alt="Course Image">';
                    echo '<div class="title">';
                    echo '<p class="main-t">' . $row['course_name'] . '</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<div class="join">';
                    echo '<a class="href" href="courespage.php?id=' . $row['course_id'] . '"><p class="text">KURSUN BAŞLA</p></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "لا توجد كورسات حاليًا.";
            }
        } else {
            echo "يجب تسجيل الدخول لعرض المساقات.";
        }
        mysqli_close($conn);
        ?>

    </div>
</div>

<script src="../../js/main.js"></script>
<script src="../../js/new.js"></script>
</body>
</html>