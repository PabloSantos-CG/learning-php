<?php

// while e do-while são semelhantes ao Js

// for in e for of, no php são substituídos por 'foreach'
// se for array associativo usamos algo semelhante ao desempacotamento do python:
// foreach($array as $key => $value) {//...}  desse modo podemos acessar tanto a chave quanto o valor

$list = ['one', 'two', 'three'];
foreach ($list as $value) {
    echo "($value) ";
}

echo '<hr />';

$listAssociate = ['one' => 'Um', 'two' => 'Dois', 'three' => 'Três'];
foreach ($listAssociate as $key => $value) {
    echo "(Key: $key => Value: $value) ";
}
