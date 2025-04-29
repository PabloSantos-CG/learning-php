<?php

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

echo '<pre>';
echo var_dump($colors);
echo '<pre />';
