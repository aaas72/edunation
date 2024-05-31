<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Makale Güncelleme</title>
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
            <p class="nav">Makale Güncelleme</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="fram">
        <?php
        global $conn;
        include '../../php/conn.php';

        if (isset($_GET['article_id'])) {
            $article_id = $_GET['article_id'];

            $sql = "SELECT * FROM articles WHERE articles_id = $article_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
                $title = $row['articles_name'];
                $dis = $row['articles_content'];
                $image = $row['img_cover'];
            } else {
                echo "";
            }
        } else {
            echo "";
        }
        ?>
        <form action="../../php/update_process.php" method="post">
            <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
            <div class="row-1">
                <label>Makale Adı</label>
                <input type="text" name="title" value="<?php echo $title; ?>">
            </div>
            <div class="row-3">
                <label>Makale</label>
                <textarea class="dis" name="dis"><?php echo $dis; ?></textarea>
            </div>
            <div class="row-2">
                <label>Rasim</label>
                <input type="file" name="img">
            </div>
            <input class="button" type="submit" value="Güncelle" name="update-article_submit">
        </form>
    </div>
</div>
<script src="../../js/admin_panel.js"></script>
</body>

</html>