<?php

namespace Alura\Banco\Modelo\Funcionario;

class Gerente extends Funcionario
{
    //Sobreescricao
    public function CalculaBonificacao(): float
    {
        return $this->GetSalario();
    }
}