<link rel="stylesheet" href="/assets/css/main.css">
<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();

if(isset($_GET['logout']) && $_GET['logout'] == 'yes'){
    unset($_SESSION['user']);
    }
if ($_SESSION['user']) {
    header('Location: main.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post">
        <div class="form-group">
        <div>
        <label>Почта:</label>
        <input type="text" name="email" placeholder="Введите свою почту">
        <div>
        <label>Пароль:</label>
        <input type="password" name="password" placeholder="Введите свой пароль">
        <div>
        <button type="submit">Войти</button>
        </div>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>