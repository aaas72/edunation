<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ders Güncelleme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/edit_panel.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <p class="nav">Ders Listesi</p>
            </div>
            <div class="sec-name">
                <input class="nav-sch-add"></input>
            </div>
            <div class="sec-name">
                <button class="nav-button-add"><a href="../Addition_Pages/addLessonPanal.php">Ders Ekle</a></button>
            </div>
            <div class="clearfix"></div>
        </div>
        <!------------------------------ KURS DÜZENLEME ------------------------------------->
        <?php
        global $conn;
        include '../php/conn.php';

        if (isset($_GET['unit_id'])) {
            $unit_id = $_GET['unit_id'];

            $sql = "SELECT * FROM lessons WHERE unit_id = $unit_id";


            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr class="title">';
                echo '<td>Ünite ID</td>';
                echo '<td>Ders ID</td>';
                echo '<td>Ders Adı</td>';
                echo '<td>Action</td>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['unit_id'] . '</td>';
                    echo '<td>' . $row['lesson_id'] . '</td>';
                    echo '<td>' . $row['lesson_name'] . '</td>';
                    echo '<td><a href="updateLessonPanal.php?lesson_id=' . $row['lesson_id'] . '">Güncelle</a>
                            <a id="delete-but-lesson" data-lesson-id="'.$row['lesson_id'].'" class="del-but">Sil</a>
                        </td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No units found for this course.';
            }
        } else {
            echo 'Course ID is not provided.';
        }
        mysqli_close($conn);
        ?>
    </div>
</div>

</div>
<script src="../../js/admin_panel.js"></script>
<script src="../../js/delete_process.js"></script>

</body>

</html>