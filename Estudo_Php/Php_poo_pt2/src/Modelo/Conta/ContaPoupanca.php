<?php

namespace Alura\Banco\Modelo\Conta;

class ContaPoupanca extends Conta
{
    //Sobreescrevendo
    protected function percentualTarifa(): float
    {
        return 0.03;
    }
}