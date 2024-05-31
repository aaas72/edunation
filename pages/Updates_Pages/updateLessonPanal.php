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

        if (isset($_GET['lesson_id'])) {
            $lesson_id = $_GET['lesson_id'];

            $sql = "SELECT * FROM lessons WHERE lesson_id = $lesson_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['lesson_name'];
                $lesson_id = $row['lesson_id'];
                $unit_id = $row['unit_id'];

            } else {
                echo "";
            }
        }
        ?>
        <form action="../../php/update_process.php" method="post" >
            <div class="sec-name">
                <p class="nav">Ders Güncelleme</p>
            </div>
            <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
            <div class="row-1">
                <label>Ünite Adı</label>
                <input type="text" name="name" maxlength="50" value="<?php echo $name;?>">
            </div>
            <div class="row-2">
                <label>Kurs Seç</label>
                <select name="unit_id" >
                    <?php
            global $conn;
            include '../php/conn.php';

            $sql = "SELECT units.unit_id, units.unit_name, units.course_id, courses.course_name 
                            FROM units 
                            INNER JOIN courses ON units.course_id = courses.course_id";
            $result = mysqli_query($conn, $sql);

            $options = "";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'. $row['unit_id'].'">'.$row["course_name"].'-' . $row['unit_name'] . ' </option>';
                }
            } else {
                echo '<option>No modules available</option>';
            }

            mysqli_close($conn);
            ?>
                </select>
            </div>
            <input class="button" type="submit" value="Güncelle" name="update-lesson-submit">
        </form>
    </div>
</div>
<script src="../../js/admin_panel.js"></script>
</body>

</html>