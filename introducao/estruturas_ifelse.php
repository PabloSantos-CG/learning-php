<?php

/* Script para determinar se um cliente tem direito ao desconto
Desconto de 20% se, valor maior do que R$200 ou se, ele for VIP
Se, valor maior do que R$150 e menor do que R$200, cliente tem desconto de 10%
*/

$value = 25;
$isVip = true;
$discount = 0;

if ($value > 200 || $isVip) {
    $discount = 20;
} elseif ($value >= 150 && $value <= 200) {
    $discount = 10;
}
echo "Você ganhou um desconto de <strong> $discount% <strong />";
