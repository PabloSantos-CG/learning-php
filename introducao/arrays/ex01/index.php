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