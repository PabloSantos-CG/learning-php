<?php
/*
 * Verifica se existe um cookie com o nome PHPSESSID (nome padrão de id do php)
 * Se existir, quer dizer que o usuário já veio de sessões anteriores
 * caso contrário ele redireciona para a página de login
 */
if (isset($_COOKIE[session_name()])) {
    session_start();
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?= $_SESSION['theme'] == 'Dark' ? '#000' : '#fff' ?>;
            color: <?= $_SESSION['theme'] == 'Dark' ? '#fff' : '#000' ?>;
        }

        .label {
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Parabéns você está logado como:
        <span class="label"><?= $_SESSION['login'] ?? '' ?></span>
    </h1>
    <a href="logout.php">Sair</a>
</body>

</html>