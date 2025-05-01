<?php
$name = 'Alesandro Kobs';
$nameLen = strlen($name);

// strings são como um array de char, por isso são mutáveis no PHP
$name[2] = 2;

// escopo da variável $name não é afetado nesse caso
// function test($name) {
//     echo $name;
// }

function search_position_word($word, $target) {
    return strpos($word, $target);
}


echo "Your name is \"$name\" and the length is $nameLen";
echo '<br />';
// sim, php usa concatenação com ponto :)
echo "A palavra Kobs começa na posição: " . search_position_word($name, 'Kobs');
