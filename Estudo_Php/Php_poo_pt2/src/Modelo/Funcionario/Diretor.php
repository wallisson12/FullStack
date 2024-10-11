<?php

namespace Alura\Banco\Modelo\Funcionario;

class Diretor extends Funcionario
{
    public function CalculaBonificacao(): float
    {
        return $this->GetSalario() * 2;
    }

    public function PodeAutenticar(string $senha):bool
    {
        return $senha === '1234';
    }
}