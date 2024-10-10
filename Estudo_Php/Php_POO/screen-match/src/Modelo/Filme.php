<?php

class Filme 
{
    //Variaveis com modificar de acesso
    public string  $nome;
    public string  $genero;
    public int $anoLancamento = 0;
    public array $notas = [];

    
    //Metodos
    function AvaliaFilme(float $nota) : void
    {
       $this->notas[] = $nota;
    }

    function MediaFilme() : float
    {
        $somaNotas = array_sum($this->notas);
        $quantidade = count($this->notas);

        return $somaNotas/$quantidade;    
    }



}