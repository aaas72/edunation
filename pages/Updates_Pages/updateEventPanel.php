<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olay Güncelleme</title>
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
    <div class="head">
        <div class="sec-name">
            <p class="nav">Olay Güncelleme</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="fram">
        <?php
        global $conn;
        include '../../php/conn.php';

        if (isset($_GET['event_id'])) {
            $event_id = $_GET['event_id'];

            $sql = "SELECT * FROM events WHERE event_id = $event_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
                $eventTitle = $row['event_name'];
                $dis = $row['event_description'];
                $time = $row['time'];
                $date = $row['date'];
                $addres = $row['location'];
                $lecturer = $row['speaker_name'];
                $cover = $row['img_cover'];
            } else {
                echo "";
            }
        }
        ?>
        <form action="../../php/update_process.php" method="post">
            <input type="hidden" name="event_id" value="<?php echo $row['event_id']; ?>">
            <div class="row-1">
                <label>Olay Adı</label>
                <input type ="text" name="name" maxlength="50" value="<?php echo $eventTitle; ?>" >
            </div>
            <div class="row-2">
                <label>Tanım</label>
                <textarea class="dis" name="dis" maxlength="200"><?php echo $dis; ?></textarea>
            </div>
            <div class="row-2">
                <label>Zaman</label>
                <input type="time" name="time" value="<?php echo $time;?>">
            </div>
            <div class="row-2">
                <label>Tarih</label>
                <input type="date" name="date" value="<?php echo $date; ?>" >
            </div>
            <div class="row-2">
                <label>Adres</label>
                <input type="text" name="addres" value="<?php echo $addres; ?>">
            </div>
            <div class="row-2">
                <label>konuşmacı</label>
                <input type="text" name="lecturer" maxlength="50" value="<?php echo $lecturer; ?>">
            </div>
            <div class="row-2">
                <label>Rasim</label>
                <input type="file" name="image" >
            </div>
            <input class="button" type="submit" value="Güncelle" name="update_event-submit">
        </form>
    </div>
</div>
<script src="../../js/admin_panel.js"></script>
</body>

</html>