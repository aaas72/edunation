<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Corures Page</title>
    <link rel="stylesheet" href="../../css/EnentPage.css">
    <link rel="stylesheet" href="../../css/player.css">
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
    <main class="page">
        <div class="main-container">
            <div class="main">
                <div class="main-bar">
                    <div class="player">
                        <?php
                        global $conn;
                        include '../../php/conn.php';

                        if (isset($_GET['id'])) {
                            $lesson_id = $_GET['id'];
                            $sql = "SELECT video_url FROM lessons WHERE lesson_id = $lesson_id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo '<iframe id="video-frame"  src="' . $row['video_url'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                            } else {
                                echo "لم يتم العثور على الفيديو.";
                            }
                        } else {
                            // إذا لم يتم تحديد معرف الدرس
                            echo "معرف الدرس غير محدد.";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>

                    <div class="buttons">
                        <button class="back">Back</button>
                        <button class="back">Next</button>
                    </div>
                </div>
            </div>
        </div>


    </main>


<script src="../../js/new.js"></script>
<script src="../../js/main.js"></script>

</body>
</html>