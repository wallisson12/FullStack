<?php

//Arry
$ListaDeDados = [1,2,3,4,5];

//o COUNT(), retorna o tamanho da lista
for ($i=0; $i < count($ListaDeDados); $i++) { 

    echo "$ListaDeDados[$i]" . PHP_EOL;
}

//Arry associativos
//Par chave valor
$conta1 = 
[
    'Titular' => 'Wallisson1',
    'Saldo' => 1000
];

$conta2 = 
[
    'Titular' => 'Wallisson2',
    'Saldo' => 10000
];

$conta3 = 
[
    'Titular' => 'Wallisson3',
    'Saldo' => 10000
];

//Para imprimir o valor assiciado a chave 'Titular'
//echo $conta1['Titular'] . PHP_EOL;
    

$contaCorrente = [$conta1,$conta2,$conta3];

//Para imprimir os arry associativos
/*
    for($i=0;$i < count($contaCorrente);$i++)
    {
        echo $contaCorrente[$i]['Titular'] . PHP_EOL;
    }
*/

//Uma maneira mais clean de imprimir cada chave titular do arry contaCorrente
foreach ($contaCorrente as $conta) 
{
    echo $conta['Titular'] . PHP_EOL;
}

