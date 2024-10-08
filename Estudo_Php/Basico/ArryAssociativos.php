<?php

$contaCorrente  = 
[
    '111' => 
    [
        'titular' => 'Maria',
        'saldo' => 10
    ],

    '222' => 
    [
        'titular' => 'Jose',
        'saldo' => 200
    ],

    '333' => 
    [
        'titular' => 'Pedro',
        'saldo' => 3000
    ],
];

foreach ($contaCorrente as $cpf => $conta) {
    echo $cpf . ' ' .$conta['titular'] . PHP_EOL;
}