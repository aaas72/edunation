<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kurs Güncelleme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/edit_panel.css" type="text/css"/>
    <link rel="stylesheet" href="../../css/add_Panel.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="mySidenav" class="sidenav">
    <h2>EduNation</h2>
    <a href="../Admin_Pages/Dashboard.php" class="icon-a"><i class="fa-solid fa-user-tie"></i> Admin paneli</a>
    <a href="../Admin_Pages/Content_management.php" class="icon-a"><i class="fa fa-pie-chart icons"></i> İçerik yönetimi</a>
    <a href="../403.php" class="icon-a"><i class="fa fa-user"></i> Profile</a>
    <a href="../Login_Signup/loginpage.php" class="icon-a"><i class="fa fa-power-off"></i> Çıkış yap</a>
</div>
<div id="main">
    <div class="fram">
        <!------------------------------ KURS DÜZENLEME ------------------------------------->
        <?php
        global $conn;
        include '../../php/conn.php';

        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];

            $sql = "SELECT * FROM courses WHERE course_id = $course_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
                $title = $row['course_name'];
                $description = $row['course_description'];
                $cover = $row['course_image'];

            } else {
                echo "";
            }
        }
        ?>
        <form action="../../php/update_process.php" method="post" enctype="multipart/form-data">
            <div class="sec-name">
                <p class="nav">Kurs Güncelleme</p>
            </div>
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
            <div class="row-1">
                <label>Kurs Adı</label>
                <input type="text" name="name" maxlength="50" value="<?php echo $title;?>">
            </div>
            <div class="row-1">
                <label>Tanım</label>
                <textarea type="text" name="description" maxlength="50"><?php echo $description; ?></textarea>
            </div>
            <div class="row-2">
                <label>Resim</label>
                <input type="file" name="course_image">
            </div>
            <input class="button" type="submit" value="Güncelle" name="update-course-submit">
        </form>
    </div>
</div>
<script src="../../js/admin_panel.js"></script>
</body>

</html>