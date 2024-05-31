<?php //session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı grişi</title>
    <link rel="stylesheet" href="../../css/loginpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
        <div class="signup-form">
            <div class="side-bar">
                <h2>EduTation</h2>
                <h2>Tekrar hoşgeldiniz!</h2>
            </div>
            <form action="../../php/login_process.php" method="post">
                <h2>Kullanıcı giriş</h2>
                <label>
                    <input type="text" id="email" name="email" placeholder="E-posta" required>
                    <?php
                    if (isset($_SESSION['email_error'])) {
                        echo '<div class="error">' . $_SESSION['email_error'] . '</div>';
                        unset($_SESSION['email_error']);
                    }
                    ?>
                </label>
                <label>
                    <input type="password" id="password" name="password" placeholder="Şifre" required>
                    <?php
                    if (isset($_SESSION['password_error'])) {
                        echo '<div class="error">' . $_SESSION['password_error'] . '</div>';
                        unset($_SESSION['password_error']);
                    }
                    ?>
                </label>
                <input id="login-button" class="but" type="submit" name="submit" value="Giriş Yap">
                <h1 class="signup">Hesabın yok mu ? <a id="login-button" href="signuppage.php" style="color: #00C72F; cursor: pointer">Hesap oluşturmak</a></h1>
            </form>
        </div>


</body>
</html>