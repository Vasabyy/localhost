<?php
    session_start();

    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (strlen($email) <=0 || strlen($password) <=0 ) {
        $_SESSION['message'] = 'Заполните форму авторизации';
        header('Location: ../index.php');
        exit();
    }

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
       
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "email" => $user['email']
        ];

        header('Location: ../main.php');
        exit();

       } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
        exit();
    }
    ?>