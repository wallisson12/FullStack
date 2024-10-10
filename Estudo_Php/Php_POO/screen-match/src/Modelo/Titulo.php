<?php

abstract class Titulo
{
    //Variaveis com modificar de acesso
    //O tipo readonly voce so pode atribuir apenas uma vez
    //Posso usar o protected tambem
    private string  $_nome;
    private Genero $_genero;
    private int $_anoLancamento;
    private array $notas;
    //Construtor
    public function __construct(string $nome,Genero $genero,int $anoLancamento)
    {
        $this->_nome = $nome;
        $this->_genero = $genero;
        $this->_anoLancamento = $anoLancamento;
        $this->notas = [];
    }
    
    //Acessores
    public function GetNome(): string{ return $this->_nome;} 
    public function GetGenero(): Genero{ return $this->_genero;} 
    public function GetAnoLancamento(): int{ return $this->_anoLancamento;} 
    
    //Metodos
    public function AvaliaFilme(float $nota) : void
    {
       $this->notas[] = $nota;
    }

    public function MediaFilme() : float
    {
        $somaNotas = array_sum($this->notas);
        $quantidade = count($this->notas);

        return $somaNotas/$quantidade;    
    }

    //Sobreescricao
    public  function  DuracaoEmMinutos():int
    {
        return 0;
    }



}