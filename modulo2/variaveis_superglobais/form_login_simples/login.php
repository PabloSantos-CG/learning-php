<?php

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($login == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['theme'] = $_POST['theme'];
        header('Location: welcome.php');
    } else {
        $message = 'Não foi possível autenticar o usuário, tente novamente.';
    }
}
