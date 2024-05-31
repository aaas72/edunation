<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Introduction</title>
        <link rel="stylesheet" href="../../css/introduction.css">
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
            </div>
        </div>
    </nav>

    <div class="intro-head">
        <div class="container-head-articles">
            <div class="text">
                <p>'' Öğrenme yolculuğunuza bugün başlayın ve en sevdiğiniz alanda gerçek potansiyelinizi ve başarının tehlikelerini keşfedin ''</p>
            </div>
        </div>

    </div>


    <div class="container-head-articles">
        <div class="body-introduction">
            <div class="left-bar">
                <div class="dis">
                    <h4 class="title">description</h4>
                    <?php
                    include '../../php/conn.php';
                    global $conn;

                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];

                        $sql = "SELECT * FROM courses WHERE course_id = $course_id";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<p class="par">' . $row ['course_description'] . '</p>';

                        } else {
                            echo "لا يوجد درس بهذا المعرف.";
                        }
                        mysqli_close($conn);
                    } else {
                        echo "معرف الدرس غير متوفر.";
                    }
                    ?>
                </div>
            </div>

            <div class="right-bar">
                <div class="card">
                    <?php
                    include '../../php/conn.php';
                    global $conn;

                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];

                        $sql = "SELECT * FROM courses WHERE course_id = $course_id";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<div class="img"> ';

                            $imageData = base64_encode($row['course_image']);
                            $src = 'data:image/jpeg;base64,' . $imageData;

                            echo '<img src="'. $src . '">';
                            echo '</div>';
                            echo '<p class="title">' . $row['course_name'] . '</p>';
                            echo '<a class="but"  href="../../php/join_lesson.php?course_id='.$row['course_id'].'">ŞİMDE KATIL</a>';

                        } else {
                            echo "لا يوجد درس بهذا المعرف.";
                        }
                        mysqli_close($conn);
                    } else {
                        echo "معرف الدرس غير متوفر.";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <script src="../../js/main.js"></script>
    </body>