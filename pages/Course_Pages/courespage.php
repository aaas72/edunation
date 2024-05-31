<?php include '../../php/check_access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kurs sayfası</title>
    <link rel="stylesheet" href="../../css/EnentPage.css">
    <link rel="stylesheet" href="../../css/courespage.css">
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
               <div class="said-bar">
                   <div class="boxs">
                       <h3>Kurs Listesi</h3>
                       <?php
                       global $conn;
                       include '../../php/conn.php';

                       $current_unit = '';
                       if (isset($_GET['id'])) {
                           $course_id = $_GET['id'];

                           $sql = "SELECT units.unit_id, units.unit_name AS unit_name, lessons.lesson_name ,lesson_id  
                                    FROM units 
                                    INNER JOIN lessons ON units.unit_id = lessons.unit_id
                                    WHERE units.course_id = $course_id 
                                    ORDER BY units.course_id ASC, lessons.lesson_id ASC";

                           $result = mysqli_query($conn, $sql);

                           if ($result && mysqli_num_rows($result) > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {
                                   if ($row['unit_id'] != $current_unit) {
                                       echo '<div class="box">';
                                       echo '<span class="title">';
                                       echo '<p>' . $row['unit_name'] . '</p>';
                                       echo '</span>';
                                       echo '</div>';

                                       $current_unit = $row['unit_id'];
                                   }

                                   echo '<ul class="box-details">';
                                   echo '<li><a href="player.php?id=' . $row['lesson_id'] . '">' . $row['lesson_name'] . '</a></li>';
                                   echo '</ul>';
                               }
                           } else {
                               echo "Mevcut ders yok.";
                           }
                       } else {
                           echo "Error: Unknow id ";
                       }

                       mysqli_close($conn);
                       ?>

                   </div>
               </div>
               <div class="main-bar">
                   <h3>Duyurular</h3>
                   <p>"Duyurular Yok"</p>

               </div>
           </div>
        </div>


        </main>

    <script src="../../js/main.js"></script>
    <script src="../../js/new.js"></script>

</body>
</html>