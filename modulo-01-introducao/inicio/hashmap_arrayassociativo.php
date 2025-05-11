<?php

$list = [
    '2w2' => 22,
    2,
    3,
    'star' => 4,
];

// são hashtables, php usa a estrutura:
// typedef struct _Bucket {
//     zend_ulong h;         // Hash da chave
//     zend_string *key;     // Ponteiro para a string da chave
//     zval val;             // Valor associado
// } Bucket;
// mais rápido para busca, pois vai direto no valor, mas, tem custo no cálculo de hash

var_dump($list);

$citys = ['Cidade-1', 'Cidade-2', 'Cidade-3', 'Cidade-4', 'Cidade-5'];
echo $citys[2] . '<br />';

// 'Array associativo'
$students = [
    'Fulano' => 21,
    'Beltrano' => 24,
    'Cicrano' => 33,
    'Jugulano' =>  45,
    'Seu Zé' => 66,
];
echo $students['Cicrano'] . '<br />';


$colors = ['Green', 'Yellow', 'White', 'Blue'];
array_push($colors, 'Red');
array_shift($colors);
print_r($colors);
echo '<br />';


$prices = [
    'Mesa' => 250,
    'Cadeira' => 2500,
    'Fone de ouvido' => 350,
    'Teclado' => 200,
    'Mouse' => 50,
];
$prices['Mesa'] += 20;
$prices['Mesa'] -= 1;
print_r($prices);