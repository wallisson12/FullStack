<?php   

class CalcularDuracaoMaratona
{
    private int $_duracaoMaratona = 0;

    //Acessores
    public function GetDuracaoMaratona():int {return $this->_duracaoMaratona;}

    public function Inclui(Titulo $titulo) : void
    {
        $this->_duracaoMaratona += $titulo->DuracaoEmMinutos();
    }
}