<?php
/*
-> Fazer um form simples que consiga validar os dados e exibir mensagem no HTML, se foi feito login ou se há algo errado
-> Manter os dados dos inputs mesmo após reload da página
*/

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($login == 'admin' && $password == 'admin') {
        $message = 'Usuário autenticado';
    } else {
        $message = 'Não foi possível autenticar o usuário, tente novamente';
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="login">
            Login:
            <input type="text" name="login" placeholder="Jhon Doe" value="<?= $login ?? '' ?>">
            <br />
        </label>

        <label for="password">
            Password:
            <input type="text" name="password" placeholder="Informe sua senha" value="<?= $password ?? '' ?>"><br />
        </label>
        <?= $message ?? '' ?>
        <button type="submit">Send</button>
    </form>
</body>

</html>