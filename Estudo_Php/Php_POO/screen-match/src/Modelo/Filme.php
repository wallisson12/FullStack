<?php

class Filme extends Titulo
{
    //Variaveis com modificar de acesso
    //O tipo readonly voce so pode atribuir apenas uma vez
    private int $_duracaoMinutos;
    //Construtor
    public function __construct(string $nome,Genero $genero,int $anoLancamento,int $duracaoMinutos)
    {
        //Uma referencia para o constructor da classe pai
        parent::__construct($nome,$genero,$anoLancamento);
        $this->_duracaoMinutos = $duracaoMinutos;
    }
     
    
    public function DuracaoEmMinutos():int
    {
        return $this->_duracaoMinutos;
    }
}