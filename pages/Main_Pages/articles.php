<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Makaleler</title>
    <link rel="stylesheet" href="../../css/articles.css">
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

<div class="head-articles">
        <div class="container-head-articles">
            <div class="text">
                <p>SİZİ BİLGİ, KÜLTÜRLER VE İLHAM VERİCİ FİKİRLER DÜNYASINA ÇEKEN FARKLI MAKALELERİ KEŞFEDİN</p>
            </div>
        </div>
        <div class="icon">
        </div>
    </div>
    <div class="container-articles">
        <div class="articles-boxs">
            <?php
            global $conn;
            include '../../php/conn.php';
            $sql = "SELECT * FROM articles ORDER BY articles_name DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="box">';
                        echo '<div class="box-cover">';
                        $imageData = base64_encode($row['img_cover']);
                        $src = 'data:image/jpeg;base64,'.$imageData;
                            echo '<img src="'.$src.'">';
                        $title = $row['articles_name'];
                        $words = explode(' ', $title);
                        $first_four_words = implode(' ', array_slice($words, 0, 5));
                        if(count($words) > 5) {
                            $first_four_words .= '...';
                        }
                        echo '<div class="title">'. $first_four_words . '</div>';

                        echo '<button class="but"><a class="href" href="../Articles_Pages/articletep.php?id=' . $row['articles_id'] . '">Makaleyi İncele</a></button>';
                        echo '<div class="date-element">';
                        echo '<div class="date1">';
                        echo '<i class="fa-regular fa-calendar"></i>';
                        $publish_date = strtotime($row['reg_date']);
                        $day_month_year = date('d M Y', $publish_date);
                        echo '<p>' . $day_month_year . '</p>';
                        echo '</div>';
                        echo '<div class="date1">';
                        echo '<i class="fa-regular fa-circle-user"></i>';
                        echo '<p>Edutation</p>';
                        echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Şu anda hiç makale yok.</p>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <footer>
        <div class="container-footer">
            <div class="main">
                <div class="top-footer">
                    <ul class="footer-list">
                        <li class="logo">
                            <h1>EduNation</h1>
                            <p>EDUNATION, EĞİTİMDE DEVRİM YARATMAK İÇİN TASARLANMIŞ YENİLİKÇİ BİR ÇEVRİMİÇİ PLATFORMDUR. ÇEŞİTLİ KURSLAR VE UZMAN ÖĞRETMENLERLE EDUNATION, TÜM SEVİYELERDEN ÖĞRENCİLER İÇİN ERİŞİLEBİLİR VE İLGİLİ ÖĞRENME DENEYİMLERİ SUNAR.</p>
                        </li>
                        <li class="support">
                            <h1>HIZLI DESTEK</h1>
                            <button>BİZE GÖNDER</button>
                        </li>
                        <li class="follwo-us">
                            <h1>BİZİ TAKİP EDİN</h1>
                            <ul class="list">
                                <li> </li>
                                <li> </li>
                                <li> </li>
                                <li> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="bot-footer">
                    <p>Copyright for educational purposes.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../js/main.js"></script>
</body>