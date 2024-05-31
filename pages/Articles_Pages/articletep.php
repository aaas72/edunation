<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="../../css/articletep.css">
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
                <li><a id="home-page">ِAna Sayfa</a></li>
                <li> <a id="coures-page">Kurslar</a></li>
                <li> <a id="articles-page">Makaleler</a></li>
                <li><a id="events-page">Olaylar</a></li>
                <li><a id="contact-page">Bize Ulaşın</a></li>
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
    <div class="articletemp-container">
        <main>
            <?php
            global $conn;
            include '../../php/conn.php';

            if (isset($_GET['article_id'])) {
                $article_id = $_GET['article_id'];

                $sql = "SELECT * FROM articles WHERE articles_id = $article_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                    $row = mysqli_fetch_assoc($result);
                    echo '<div class="title">';
                    echo '<h1>'. $row['articles_name'].'</h1>';
                    echo '<span>'.$row['reg_date'].'</span>';
                    echo '</div>';
                    $imageData = base64_encode($row['img_cover']);
                    $src = 'data:image/jpeg;base64,' . $imageData;
                    echo '<img class="img-cover"  src="' . $src . '" alt="Article Image">';                    echo '<p>'.$row['articles_content'].'</p>';
                } else {
                    echo "المقالة غير موجودة.";
                }
            } else {
                echo "المعرِّف غير محدد.";
            }

            mysqli_close($conn);
            ?>

        </main>
    </div>

    <script src="../../js/main.js"></script>
    <script src="../../js/new.js"></script>
</body>