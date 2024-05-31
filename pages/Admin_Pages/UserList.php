<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcılar List</title>
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
        <div class="head">
            <div class="sec-name">
                <p class="nav">Kullanıcılar List</p>
            </div>
            <div class="sec-name">
                <input class="nav-sch-add"></input>
            </div>
            <div class="sec-name">
                <button class="nav-button-add"><a href="../Addition_Pages/addUserPanel.php">Kullancı Ekle</a></button>
            </div>
        </div>
        <!------------------------------------------------>
        <!----------------Kullanıcılar bölümü------------------->
        <table>
            <tr class="">
                <td class="title">ID</td>
                <td class="title">Adı</td>
                <td class="title">Email</td>
                <td class="title">Şifre</td>
                <td class="title">Rol_ID</td>
                <td class="title">Action</td>
            </tr>
            <?php
            global $conn;
            include '../../php/conn.php';

            $sql = "SELECT users.* 
            FROM users ";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['user_id'] . '</td>';
                    echo '<td>' . $row['user_name'] . '</td>';
                    echo '<td>' . $row['user_email'] . '</td>';
                    echo '<td>' . $row['user_password'] . '</td>';
                    echo '<td>' . $row['user_rol_id'] . '</td>';
                    echo '<td><a href="../Updates_Pages/updateUserPanel.php?user_id='.$row['user_id'].'"><i class="fa-solid fa-square-pen fa-lg"></i></a>
                           <button class="" id="delete-but-user" data-user-id="'.$row['user_id'].'"><i class="fa-solid fa-trash"></i></button>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No users found</td></tr>';
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <!----------------JS FILE içe aktarın------------------->
    <script src="../../js/admin_panel.js"></script>
    <script src="../../js/delete_process.js"></script>
</body>
</html>