<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kurslar List</title>
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
    <!-----------------------------------Yan gezinme çubuğu------------------------------------------------>
    <div id="mySidenav" class="sidenav">
        <h2>EduNation</h2>
        <a href="Dashboard.php" class="icon-a"><i class="fa-solid fa-user-tie"></i> Admin paneli</a>
        <a href="Content_management.php" class="icon-a"><i class="fa fa-pie-chart icons"></i> İçerik yönetimi</a>
        <a href="../403.php" class="icon-a"><i class="fa fa-user"></i> Profile</a>
        <a href="../Login_Signup/loginpage.php" class="icon-a"><i class="fa fa-power-off"></i> Çıkış yap</a>
    </div>
    <!------------------------------------------------------------------------------------------------------>
    <!-----------------------------------Ana çubuk---------------------------------------------------------->
    <div id="main">
        <!----------------Başlık bölümü------------------->
        <div class="head"  >
            <div class="sec-name">
                <p class="nav">Kurslar List</p>
            </div>
            <div class="sec-name">
                <input class="nav-sch-add"></input>
            </div>
            <div class="sec-name">
                <button class="nav-button-add"><a href="../Addition_Pages/addCouresPanel.php">Kurs Ekle</a></button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <br/>
        <!------------------------------------------------>
        <!----------------Kurslar bölümü------------------->
        <?php
        global $conn;
        include '../../php/conn.php';

        $sql = "SELECT course_id, course_name, course_image FROM courses";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-div-4-1">';
                echo '<div class="box">';
                $imageData = base64_encode($row['course_image']);
                $src = 'data:image/jpeg;base64,' . $imageData;
                echo '<img src="'. $src . '" onclick="window.location.href=\'UnitList.php?course_id=' . $row['course_id'] . '\'" alt="Course Image" >';
                echo '<div class="bot-bar">';
                echo '<p class="head-1">'.$row["course_name"] . '</p>';
                echo '<div class="up-del">';
                echo '<i class="fa-solid fa-ellipsis-vertical fa-lg list-edit" onclick="toggleMenu(' . $row["course_id"] . ')"></i>';
                echo '<ul class="list-unstyled" id="menu-' . $row["course_id"] . '" style="display: none;">';
                echo '<li><a href="../Updates_Pages/updateCoursePanal.php?course_id=' . $row["course_id"] . '">Güncelle</a></li>';
                echo '<li class="but-delete" id="delete-but-course" data-course-id="' . $row['course_id'] . '">Sil</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No courses found';
        }

        mysqli_close($conn);
        ?>

    </div>
    <!----------------JS FILE içe aktarın------------------->
    <script src="../../js/delete_process.js"></script>
    <script src="../../js/admin_panel.js"></script>

</body>

</html>