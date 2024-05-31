<?php include '../../php/check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>İçerik yönetimi</title>
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
          <p class="nav">İçerik yönetimi</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <!------------------------------------------------>
    <!----------------Kurslar bölümü------------------->
   <div class="col-div-4-1">
    <div class="box" id="courses">
      <p class="head-1">Kurslar</p>
      <i class="fa-regular fa-newspaper box-icon"></i>
      <br/>
    </div>
  </div>
    <!------------------------------------------------>
    <!----------------Makalelar bölümü------------------->
    <div class="col-div-4-1">
    <div class="box" id="articles">
      <p class="head-1">Makaleler</p>
      <i class="fa-regular fa-newspaper box-icon"></i>
      <div class="clearfix"></div>
      <br/>

    </div>
  </div>
    <!------------------------------------------------>
    <!----------------Olaylar bölümü------------------->
    <div class="col-div-4-1">
    <div class="box"id="events">
      <p class="head-1">Olaylar</p>
      <i class="fa-regular fa-newspaper box-icon"></i>
      <div class="clearfix"></div>
    </div>
  </div>
    <!------------------------------------------------>
    <!----------------Kullanıcılar bölümü------------------->
    <div class="col-div-4-1">
        <div class="box"id="users">
            <p class="head-1">Kullanıcılar</p>
            <i class="fa-regular fa-newspaper box-icon"></i>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!----------------JS FILE içe aktarın------------------->
<script src="../../js/w.js"></script>
<script src="../../js/admin_panel.js"></script>
</body>

</html>