<?php

/**
* Gera uma string de saudação concatenando com um número
* @param string $word palavra qualquer para ser concatenada na string
* @param int $number número que será concatenado na string de retorno
* @return string retorna uma string de saudação, contendo uma string e um int concatenados à string de retorno
*/
function printToHello(string $word, int $number = 0): string {
    return "Hello $word <> $number";
}

echo printToHello("Fulano");
echo '<br />';

// Parâmetros nomeados:
echo printToHello(number:  22, word: "Cicrano");

