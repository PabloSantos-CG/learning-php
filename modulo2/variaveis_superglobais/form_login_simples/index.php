<?php require('login.php') ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login básico</title>

</head>

<body>
    <form action="" method="post">
        <label for="login">
            Usuário:
            <input type="text" name="login" placeholder="Jhon Doe" value="<?= $login ?? '' ?>">
            <br />
        </label>

        <label for="password">
            Senha:
            <input type="text" name="password" placeholder="Informe sua senha" value="<?= $password ?? '' ?>"><br />
        </label>


        <label for="theme">Escolha o tema:
            <select name="theme" id="theme">
                <option value="Light">Ligth</option>
                <option value="Dark">Dark</option>
            </select>
        </label>

        <button type="submit">Enviar</button>

        <?= isset($message) ? '<br/>' . $message : ''; ?>
    </form>
</body>

</html>