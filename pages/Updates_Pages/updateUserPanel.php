<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>kullanıcı Güncelleme</title>
    <link rel="stylesheet" href="../../css/edit_panel.css" type="text/css"/>
    <link rel="stylesheet" href="../../css/add_Panel.css" type="text/css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
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
                <p class="nav">Kullanıcı Güncelleme</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <br/>
        <!------------------------------------------------>
        <!----------------Kullanıcılar bölümü------------------->
        <div class="fram">
            <?php
            global $conn;
            include '../../php/conn.php';

            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $sql = "SELECT * FROM users WHERE user_id = $user_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['user_name'];
                    $email = $row['user_email'];
                    $password = $row['user_password'];
                    $role = $row['user_rol_id'];
                } else {
                    echo "User not found.";
                }
            } else {
                echo "No user ID provided.";
            }
            ?>

            <form action="../../php/update_process.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                <div class="row-1">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="name" maxlength="50" value="<?php echo $name ?>"">
                </div>
                <div class="row-1">
                    <label>Email</label>
                    <input type="email" name="email" maxlength="50" value="<?php echo $email ?>">
                </div>
                <div class="row-1">
                    <label>Password</label>
                    <input type="password" name="password" maxlength="50" value="<?php echo $password ?>">
                </div>
                <div class="row-1">
                    <label>Rol Seç</label>
                    <select  name="role">
                        <?php
                        global $conn;
                        include '../php/conn.php';

                        $sql = "SELECT * FROM roles   ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['role_id'] . '">'.$row['role_name'].'</option>';
                            }
                        } else {
                            echo "<option value=''>No roles found</option>";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <input class="button" type="submit" value="Güncelle" name="update_user_submit">
            </form>
        </div>
    </div>
    <!----------------JS FILE içe aktarın------------------->
    <script src="../../js/admin_panel.js"></script>
</body>
</html>