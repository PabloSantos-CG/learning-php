<?php

// isset() ->verifica se a variável existe
// empty() ->usada para verificar se uma variável está vazia


/*
Capturar dados via QueryString usamos o GET
limite de 2000 caracteres (caso deseje enviar dados)

*/
if (!empty($_GET['login']) && !empty($_GET['password'])) {
    echo 'Login: ' . $_GET['login'] . '<br/>';
    echo 'Password: ' . $_GET['password'];
    echo '<br /><a href="index.html">Voltar</a>';
} else {
    echo 'Variaveis indefinidas.';
    echo '<br /><a href="index.html">Voltar</a>';
}
?>