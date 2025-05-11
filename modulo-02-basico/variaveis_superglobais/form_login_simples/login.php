<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (empty($login) && empty($password)) {
        $message = 'Preencha todos os dados.';
    } elseif (empty($login)) {
        $message = 'Você precisa preencher o campo \'login\'.';
    } elseif (empty($password)) {
        $message = 'Você precisa preencher o campo \'password\'.';
    }
}

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['theme'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $theme = htmlspecialchars($_POST['theme']);

    if ($login == 'admin' && $password == 'admin') {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['theme'] = $theme;
        header('Location: welcome.php');
    } else {
        $message = 'Não foi possível autenticar, usuário ou senha inválidos.';
    }
}
