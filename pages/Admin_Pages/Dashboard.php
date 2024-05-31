<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin paneli</title>
    <!-----------------------------------AWESOME kütüphanesinden simgeleri içe aktarın------------------------------------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-----------------------------------Yazı tipini GOOGLE FONT kütüphanesinden içe aktarın------------------------------------------------>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!-----------------------------------CSS FILE içe aktarın------------------------------------------------>
    <link rel="stylesheet" href="../../css/panal.css" type="text/css"/>
</head>
<body>
    <!-----------------------------------Yan gezinme çubuğu------------------------------------------------>
    <div id="mySidenav" class="sidenav">
        <h2>EduNation</h2>
        <a href="Dashboard.php" class="icon-a"><i class="fa-solid fa-user-tie"></i> Admin paneli</a>
        <a href="Content_management.php" class="icon-a"><i class="fa fa-pie-chart icons"></i> İçerik yönetimi</a>
        <a href="../403.php" class="icon-a"><i class="fa fa-user"></i> Profile</a>
        <a class="icon-a" id="log-out"><i class="fa fa-power-off"></i> Çıkış yap</a>
    </div>
    <!------------------------------------------------------------------------------------------------------>
    <!-----------------------------------Ana çubuk---------------------------------------------------------->
    <div id="main">
        <!----------------Başlık bölümü------------------->
        <div class="head">
            <div class="sec-name">
                <p class="nav">Dashboard</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <!------------------------------------------------>
        <!----------------Kurslar bölümü------------------->
        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Makale sayısı</p>
                <?php
                global $conn;
                include '../../php/conn.php';

                $sql = "SELECT COUNT(*) as article_count FROM users";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $article_count = $row['article_count'];
                    echo '<p class="number">' . $article_count . '</p>';
                } else {
                    echo '<p class="number">Error</p>';
                }

                mysqli_close($conn);
                ?>
                <i class="fa-regular fa-newspaper box-icon"></i>
            </div>

        </div>
        <!------------------------------------------------>
        <!----------------Makalelar bölümü------------------->
        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Olaylar Sayısı</p>
                <?php
                global $conn;
                include '../../php/conn.php';

                // استعلام لحساب عدد المقالات
                $sql = "SELECT COUNT(*) as event_count FROM users";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $event_count = $row['event_count'];
                    echo '<p class="number">' . $event_count . '</p>';
                } else {
                    echo '<p class="number">Error</p>';
                }

                mysqli_close($conn);
                ?>
                <i class="fa-regular fa-newspaper box-icon"></i>
            </div>

        </div>
        <!------------------------------------------------>
        <!----------------Olaylar bölümü------------------->
        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Kurslar Sayısı</p>
                <?php
                global $conn;
                include '../../php/conn.php';

                $sql = "SELECT COUNT(*) as course_count FROM courses";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $course_count = $row['course_count'];
                    echo '<p class="number">' . $course_count . '</p>';
                } else {
                    echo '<p class="number">Error</p>';
                }

                mysqli_close($conn);
                ?>
                <i class="fa-regular fa-newspaper box-icon"></i>
            </div>

        </div>
        <!------------------------------------------------>
        <!----------------Kullanıcılar bölümü------------------->
        <div class="clearfix"></div>
        <br/>
        <div class="col-div-12">
            <div class="box-8">
                <div class="content-box">
                    <p>Yani Kullanıcılar</p>
                    <br/>
                    <table>
                        <tr class="">
                            <td class="title">Kullanıcı ID</td>
                            <td class="title">Adı</td>
                            <td class="title">Email</td>
                            <td class="title">Kullanıcı Rolu ID</td>
                        </tr>
                        <?php
                        global $conn;
                        include '../../php/conn.php';

                        $sql = "SELECT * FROM users ";
                        $result = mysqli_query($conn, $sql);

                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['user_id'] . '</td>';
                                echo '<td>' . $row['user_name'] . '</td>';
                                echo '<td>' . $row['user_email'] . '</td>';
                                echo '<td>' . $row['user_rol_id'] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">No users found</td></tr>';
                        }
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------>
    </div>
    <!----------------JS FILE içe aktarın------------------->
    <script src="../../js/main.js"></script>
</body>
</html>