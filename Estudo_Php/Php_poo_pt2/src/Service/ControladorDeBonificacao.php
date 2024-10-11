<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario;

class ControladorDeBonificacao
{
    private $totalBonificacao = 0;

    public function RecuperaTotalBonificacao(): float{ return $this->totalBonificacao;}
    public function AdcionaBonificacao(Funcionario $funcionario):void
    {
        $this->totalBonificacao += $funcionario->CalculaBonificacao();
    }


}