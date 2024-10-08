<?php

$contaCorrente  = 
[
    '111' => 
    [
        'titular' => 'Maria',
        'saldo' => 1000
    ],

    '222' => 
    [
        'titular' => 'Jose',
        'saldo' => 2000
    ],

    '333' => 
    [
        'titular' => 'Pedro',
        'saldo' => 3000
    ],
];

$contaCorrente['111']['saldo'] -= 500;


foreach ($contaCorrente as $cpf => $conta) {
    echo $cpf . ' ' .$conta['titular'] . ' '. $conta['saldo'] . PHP_EOL;
}