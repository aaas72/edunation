<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kurs Güncelleme</title>
    <!-----------------------------------AWESOME kütüphanesinden simgeleri içe aktarın------------------------------------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-----------------------------------Yazı tipini GOOGLE FONT kütüphanesinden içe aktarın------------------------------------------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!-----------------------------------CSS FILE içe aktarın------------------------------------------------>
    <link rel="stylesheet" href="../../css/edit_panel.css" type="text/css"/>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <h2>EduNation</h2>
        <a href="Dashboard.php" class="icon-a"><i class="fa-solid fa-user-tie"></i> Admin paneli</a>
        <a href="Content_management.php" class="icon-a"><i class="fa fa-pie-chart icons"></i> İçerik yönetimi</a>
        <a href="../403.php" class="icon-a"><i class="fa fa-user"></i> Profile</a>
        <a href="../Login_Signup/loginpage.php" class="icon-a"><i class="fa fa-power-off"></i> Çıkış yap</a>
    </div>
    <div id="main">
        <div class="fram">
            <div class="head">
                <div class="sec-name">
                    <p class="nav">Üniteler Listesi</p>
                </div>
                <div class="sec-name">
                    <input class="nav-sch-add">
                </div>
                <div class="sec-name">
                    <button class="nav-button-add"><a href="../Addition_Pages/addUnitPanel.php">Ünite Ekle</a></button>
                </div>
                <div class="sec-name">
                    <button class="nav-button-add"><a href="../Addition_Pages/addLessonPanal.php">Ders Ekle</a></button>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            global $conn;
            include '../../php/conn.php';

            if (isset($_GET['course_id'])) {
                $course_id = $_GET['course_id'];

                $sql_units = "SELECT * FROM units WHERE course_id = $course_id";
                $result_units = mysqli_query($conn, $sql_units);

                if (mysqli_num_rows($result_units) > 0) {
                    echo '<ul class="unit-list">';

                    while ($unit = mysqli_fetch_assoc($result_units)) {
                        echo '<li>';
                            echo '<div class="unit-header">';
                            echo '<a href="#" onclick="toggleLessons('.$unit['unit_id'] . ')"><i class="fa-solid fa-chevron-up"></i> ' . $unit['unit_name'] . '</a>';
                            echo '<div class="up-del">';
                                echo '<i class="fa-solid fa-ellipsis-vertical fa-lg list-edit"></i>';
                                echo '<ul class="list-unstyled">';
                                    echo '<li><a href="../Updates_Pages/updateUnitPanal.php?unit_id='.$unit["unit_id"].'">Güncelle</a></li>';
                                    echo '<li class="but-delete" id="delete-but-unit" data-unit-id="'.$unit['unit_id'].'">Sil</li>';
                                echo '</ul>';
                            echo '</div>';
                            echo '</div>';

                        echo '<ul class="lesson-list" id="lessons-' . $unit['unit_id'] . '" style="display:none;">';
                        $sql_lessons = "SELECT * FROM lessons WHERE unit_id = " . $unit['unit_id'];
                        $result_lessons = mysqli_query($conn, $sql_lessons);

                        if (mysqli_num_rows($result_lessons) > 0) {
                            while ($lesson = mysqli_fetch_assoc($result_lessons)) {
                                echo '<li>';
                                echo '<div class="lesson-header">';
                                echo '<a href="lessonDetails.php?lesson_id=' . $lesson['lesson_id'] . '">' . $lesson['lesson_name'] . '</a>';
                                echo '<div class="">';
                                echo '<button class="but-unit" id="delete-but-lesson" data-lesson-id="'.$lesson['lesson_id'].'"><i class="fa-solid fa-trash"></i></button>';
                                echo '<a href="../Updates_Pages/updateLessonPanal.php?lesson_id='.$lesson['lesson_id'].'"><i class="fa-solid fa-pen"></i></a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</li>';
                            }
                        } else {
                            echo '<li>No lessons found for this unit.</li>';
                        }

                        echo '</ul>';
                        echo '</li>';
                    }

                    echo '</ul>';
                } else {
                    echo 'No units found for this course.';
                }
            } else {
                echo 'Course ID is not provided.';
            }
            mysqli_close($conn);
            ?>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var triggerButtons = document.querySelectorAll('.list-edit');
                    triggerButtons.forEach(function(triggerButton) {
                        triggerButton.addEventListener('click', function () {
                            var list = this.parentElement.querySelector('.list-unstyled');
                            list.classList.toggle('active');
                        });
                    });

                });
            </script>

        </div>
    </div>

    <script src="../../js/admin_panel.js"></script>
    <script src="../../js/delete_process.js"></script>
</body>
</html>