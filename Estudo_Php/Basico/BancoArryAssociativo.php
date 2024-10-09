<?php

//Chamando arquivos e verificando se ja foi importado
require_once 'FuncoesBanco.php';

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


//Sacando do saldo
//$contaCorrente['111']['saldo'] -= 500;
$contaCorrente['111'] = WithDraw($contaCorrente['111'],100);

//Depositando na conta
$contaCorrente['222'] = Deposit($contaCorrente['222'],100);

//Deixando o nome como letra maior
//LettersUp($contaCorrente['333']);

//Removendo conta
RemoveAccount($contaCorrente,$contaCorrente['333']);


foreach ($contaCorrente as $cpf => $conta) 
{
    //Interpolacao
    ShowAccount($conta);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contas Correntes</h1>
    <dl>
        <?php foreach($contaCorrente as $cpf => $conta){?>

            <dt>
                <h3><?=$conta['titular']; - $cpf;?></h3>
            </dt>

            <dd>
                Saldo: <?= $conta['saldo']; ?>
            </dd>

        <?php } ?>
        
    </dl>
</body>
</html>