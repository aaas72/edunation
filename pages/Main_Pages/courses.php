<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kursler</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../css/coureslist.css">
    <link rel="stylesheet" href="../../css/EnentPage.css">
    <link rel="stylesheet" href="../../css/events.css">

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
                <p class="par-1">Sİzİn İçİn Seçİlmİş Kusrlar</p>
            </div>
        </div>
    </div>
    <div class="container-coures-list">
        <div class="coures-list-boxs">
            <?php
            global $conn;
            include '../../php/conn.php';

            $sql = "SELECT * FROM courses ORDER BY course_name DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="box">';

                    $imageData = base64_encode($row['course_image']);
                    $src = 'data:image/jpeg;base64,' . $imageData;
                    echo '<img src="'. $src . '" alt="Course Image">';
                    echo '<div class="title">';
                    echo '<p class="main-t">' . $row['course_name'] . '</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<div class="join">';
                    echo '<a class="href" href="../Course_Pages/introduction.php?course_id=' . $row['course_id'] . '"><p class="text">ŞİMDE KATIL</p></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "لا توجد كورسات حاليًا.";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script src="../../js/main.js"></script>
    <script src="../../js/new.js"></script>
</body>
</html>