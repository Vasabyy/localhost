<link rel="stylesheet" href="/assets/css/main.css">
<?php
error_reporting(E_ALL ^ E_WARNING);
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<?php
$email = '';
if($_SESSION['email']){ $email = $_SESSION['email']; unset($_SESSION['email']); }
?>
    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post">
        <label>Почта:</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты" value='<?=$email?>'> 
        <label>Пароль:</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля:</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Зарегистироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>