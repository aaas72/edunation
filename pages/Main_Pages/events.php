<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Events</title>
      <link rel="stylesheet" href="../../css/events.css">
        <link rel="stylesheet" href="../../css/EnentPage.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
      />
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
    <div class="events-head ">
        <div class="container-head">
          <div class="text">
            <p class="par-1">DÜNYANIN HER YERİNDEN ETKİNLİKLER</p>
          </div>
        </div>
    </div>
    <div class="container-events">
        <div class="events-boxs">
            <?php
            global $conn;
            include "../../php/conn.php";

            $sql = "SELECT * FROM events ORDER BY date DESC LIMIT 2";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="box">';
                    echo '<div class="cover">';
                    $imageData = base64_encode($row['img_cover']);
                    $src = 'data:image/jpeg;base64,' . $imageData;
                    echo '<img src="'. $src . '" alt="Event Image">';
                    echo '<div class="date">';
                    echo '<p>' . date('d M', strtotime($row['date'])) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="title">';
                    echo '<p class="title">' . $row['event_name'] . '</p>';
                    echo '<p class="dis">' . $row['event_description'] . '</p>';
                    echo '</div>';
                    echo '<ul class="info">';
                    echo '<li class="address">';
                    echo '<div></div>';
                    echo '<p class="title-1">Address</p>';
                    echo '<p class="title-2">' . $row['location'] . '</p>';
                    echo '</li>';
                    echo '<li class="time">';
                    echo '<div></div>';
                    echo '<p class="title-1">Time</p>';
                    echo '<p class="title-2">' . $row['time'] . '</p>';
                    echo '</li>';
                    echo '<li class="lecturer">';
                    echo '<div></div>';
                    echo '<p class="title-1">Lecturer</p>';
                    echo '<p class="title-2">' . $row['speaker_name'] . '</p>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</div>';
                }
            } else {
                echo "لا توجد مقالات حاليًا.";
            }
            ?>
        </div>
  </div>

    <script src="../../js/main.js"></script>
</body>