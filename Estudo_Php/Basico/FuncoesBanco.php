<?php

//Criacao de funcao
//Especificando o tipo do paramentro e o retorno da funcao
function ShowMensage(string $mensage) : void
{
    echo $mensage . '<br>';
}

function WithDraw(array $conta,float $valor) : array
{
    if($valor <= $conta['saldo'])
    {
       $conta['saldo'] -= $valor;
    }
    else
    {
        ShowMensage("Saldo abaixo do valor de saque, seu saldo eh: " . $conta['saldo']);
    }

    return $conta;
}

function Deposit(array $conta, float $valor) : array
{
    if($valor > 0)
    {
        $conta['saldo'] += $valor;
    }
    else
    {
        ShowMensage("Valor de deposito incorreto");
    }

    return $conta;
}


function RemoveAccount(array &$list,array $conta)
{
    //Verificar se a conta existe e depois remover ja passando o novo array
}

//Pegando a referencia na memoria da conta, ou seja, passando por referencia
function LettersUp(array &$conta)
{
    $conta['titular'] = strtoupper($conta['titular']);
}

function ShowAccount(array $conta)
{
    echo "<li>Titular: {$conta['titular']} Saldo: {$conta['saldo']}</li>";
}