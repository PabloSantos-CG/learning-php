<?php

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $theme = htmlspecialchars($_POST['theme']);

    if ($login == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['theme'] = $theme;
        header('Location: welcome.php');
    } else {
        $message = 'Não foi possível autenticar, usuário ou senha inválido.';
    }
} elseif (!empty($_POST['login']) || !empty($_POST['password'])) {
    $message = 'Preencha todos os dados.';
}
