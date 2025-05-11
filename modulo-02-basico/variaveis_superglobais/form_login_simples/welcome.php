<?php

session_start();

if (empty($_SESSION['login'])) {
    header('Location: index.php');
    exit();
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