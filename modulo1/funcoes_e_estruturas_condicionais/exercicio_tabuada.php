<?php

// Tabuada de multiplicação do 5 com while
function printMultiplicationTable(int $factor)
{
    $factorAux = 0;

    while ($factorAux <= 10) {
        $product = $factor * $factorAux;

        echo "$factor * $factorAux = $product";
        echo '<br />';
        $factorAux++;
    }
}
printMultiplicationTable(4);


// soma de 1 à 20 com while
function printSumOfN1ToN2(int $number, int $range = 20)
{
    $accumulator = 0;
    while ($number <= $range) {
        $accumulator += $number;
        $number++;

        echo "Acumulador é $accumulator; Contador atual é $number" . "<br />";
    }
}
echo '<hr />';
printSumOfN1ToN2(0);
