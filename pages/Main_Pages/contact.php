<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../css/contact.css">
    <link rel="stylesheet" href="../../css/EnentPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container-navbar">
            <div class="nav-row">
                <ul class="logo">
                    <li>EduNation</li>
                </ul>
                <ul class="list">
                    <li><a href="home.php"><p>Ana Sayfa</p></a></li>
                    <li><a href="courses.php"><p>Kurslar</p></a></li>
                    <li><a href="articles.php"><p>Makaleler</p></a></li>
                    <li><a href="events.php"><p>Olaylar</p></a></li>
                    <li><a href="contact.php"><p>Bize Ulaşın</p></a></li>
                </ul>
                <ul class="buttons">
                    <li class="but">
                    </li>
                    <li class="acc" id="icon">
                        <i class="fa-regular fa-user "></i>
                    </li>
                </ul>
            </div>
            <div class="account" id="acco">
                <ul class="personel-info">
                    <li id="my-course"><i class="fa-regular fa-bookmark fa-md"></i>Kurslarim</li>
                    <li id="log-out"><i class="fa-solid fa-arrow-right-from-bracket"></i>Çıkış Yap</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="cuntactus-head">
            <div class="container-cuntactus-head">
            <div class="text">
                <p class="title">BİZE ULAŞIN</p>
            </div>
        </div>
        </div>
    <form class="form-body">
        <label>Adı ve soyadı</label>
        <input  type="text" name="fullname" placeholder=" ">
        <label>Email</label>
        <input type="email" name="email" placeholder=" ">
        <label>Message</label>
        <input class="mas" type="text" name="masgees" placeholder=" ">
        <input class="but" type="button" value="Gönder" >
    </form>

    <script src="../../js/main.js"></script>
</body>