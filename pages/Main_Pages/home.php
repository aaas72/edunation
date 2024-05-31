<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../css/style.css">
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
    <div class="head ">
        <div class="container-head">
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<div class='text'>
                <p class='par-1'>Hoş geldiniz</p>
                <p class='title'>$username</p>
              </div>";
            } else {
                header("Location: ../Login_Signup/loginpage.php");
                exit();
            }
            ?>
        </div>
    </div>
    <div class="available">
        <div class="container-available">
            <h1 class="title"><span style="color: #00C72F;">MEVCUT</span> KURSLAR</h1>
            <div class="boxs">
                <?php
                global $conn;
                include "../../php/conn.php";

                $sql = "SELECT * FROM courses ORDER BY course_id DESC LIMIT 4";
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
                        echo '<a class="href" href="../Course_Pages/introduction.php?course_id=' . $row["course_id"] . '"><p class="text">ŞİMDE KATIL</p></a>';
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
            <button ><a href="../Main_Pages/courses.php">Daha fazla gör</a></button>
        </div>
    </div>
    <div class="paths">
        <div class="container-paths">
            <h1 class="title"><span style="color: #00C72F;"> EĞİTİM</span> YOLLARI</h1>
            <div class="boxs">
                <div class="box">
                    <i class="fa-solid fa-code fa-4x"></i>
                    <p>Programlama</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-pen-nib fa-4x"></i>
                    <p>Grafik Tasarım</p>

                </div>
                <div class="box">
                    <i class="fa-solid fa-people-group fa-4x"></i>
                    <p>kişisel Yetenekler</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-language fa-4x"></i>
                    <p>Diller</p>
                </div>
            </div>
        </div>
    </div>
    <div class="recent">
        <div class="container-recent">
            <h1 class="title"><span style="color: #00C72F;"> SON MAKALELER</span> </h1>
            <div class="boxs">
                <div class="boxs">
                    <?php
                    include "../../php/conn.php";
                    $sql = "SELECT * FROM articles ORDER BY reg_date DESC LIMIT 4";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="box">';
                                $imageData = base64_encode($row['img_cover']);
                                $src = 'data:image/jpeg;base64,' . $imageData;
                                echo '<img src="' . $src . '" onclick="window.location.href=\'../Articles_Pages/articletep.php?article_id=' . $row['articles_id'] . '\'" alt="Article Image">';
                                echo '<div class="title">';
                                $title = $row['articles_name'];
                                $words = explode(' ', $title);
                                $first_four_words = implode(' ', array_slice($words, 0, 4));
                                if(count($words) > 4) {
                                    $first_four_words .= '...';
                                }
                                echo '<p class="main-t">'. $first_four_words . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "لا توجد مقالات حاليًا.";
                        }
                    } else {
                        echo "حدث خطأ أثناء تنفيذ الاستعلام: " . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    ?>
                </div>

            </div>
            <a href="articles.php">Daha fazla gör</a>
        </div>
    </div>
    <div class="events">
        <div class="container-events">
            <h1 class="title">YAKLAŞAN<span style="color: #00C72F;"> OLAYLAR</span></h1>
            <div class="boxs">
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
            <button ><a href="events.php">Daha fazla gör</a></button>

        </div>
    </div>

<footer>
    <div class="container-footer">
        <div class="main">
            <div class="footer">
                <div class="top-footer">
                    <ul class="footer-list">
                        <li class="logo">
                            <h1>EduNation</h1>
                            <p>EDUNATION, EĞİTİMDE DEVRİM YARATMAK İÇİN TASARLANMIŞ YENİLİKÇİ BİR ÇEVRİMİÇİ PLATFORMDUR. ÇEŞİTLİ KURSLAR VE UZMAN ÖĞRETMENLERLE EDUNATION, TÜM SEVİYELERDEN ÖĞRENCİLER İÇİN ERİŞİLEBİLİR VE İLGİLİ ÖĞRENME DENEYİMLERİ SUNAR.</p>
                        </li>
                        <li class="partners">
                            <h1>BİZİM ORTAKLARIMIZ</h1>
                            <ul class="list">
                                <li>Tima DEU</li>
                                <li>Tima DEU</li>
                                <li>Tima DEU</li>
                                <li>Tima DEU</li>
                            </ul>
                        </li>
                        <li class="follwo-us">
                            <h1>BİZİ TAKİP EDİN</h1>
                            <ul class="list">
                                <li><i class="fa-brands fa-x-twitter fa-lg"></i></li>
                                <li><i class="fa-brands fa-whatsapp fa-lg"></i></li>
                                <li><i class="fa-brands fa-instagram fa-lg"></i></li>
                                <li><i class="fa-brands fa-facebook-f fa-lg"></i></li>
                            </ul>

                        </li>
                    </ul>
                </div>
                <div class="bot-footer">
                    <p>Copyright for educational purposes.</p>
                </div>
            </div>

        </div>
    </div>

</footer>

<script src="../../js/main.js"></script>
</body>
</html>