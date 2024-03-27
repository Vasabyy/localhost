<?php
   session_start();

    require_once 'connect.php';
  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $_SESSION['email']=$email;

    if (strlen($email)<=0 || strlen($password_confirm) <=0 || strlen($password) <=0 ) {
        $_SESSION['message'] = 'Заполните форму регистрации';
        header('Location: ../register.php');
        exit();
    }

    if ($password != $password_confirm) {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
        exit();
    }

    if (strlen($password) < 8 || strlen($password) > 32) {
        $_SESSION['message'] = 'Пароль должен содержать не менее 8 и не более 32 символов';
        header('Location: ../register.php');
        exit();
    } 

    if (!preg_match('/^[A-Za-z0-9]*$/', $password)) {
        $_SESSION['message'] = 'Пароль должен состоять из латинских букв и цифр';
        header('Location: ../register.php');
        exit();
    }

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')");

    unset($_SESSION['email']);

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../index.php');
    exit(); 
    ?>