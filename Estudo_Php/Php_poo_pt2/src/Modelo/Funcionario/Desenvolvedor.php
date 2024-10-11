<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario
{

    public function SobeNivel():void
    {
        $this->RecebeAumento($this->GetSalario() * 0.75);
    }

    function CalculaBonificacao(): float
    {
        return $this->GetSalario() * 0.01;
    }
}