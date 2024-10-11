<?php

//Definindo o namespace
namespace Alura\Banco\Modelo\Conta;

//Falando para o php procurar as classes nesse namespace
use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

class Titular extends Pessoa
{
    private Endereco $_endereco;
    public function __construct(string $nome,CPF $cpf,Endereco $endereco)
    {
        //Construtor do pai
        parent::__construct($nome, $cpf);
        $this->_endereco = $endereco;
    }

    //Acessores
    public function recuperaEndereco():Endereco{return $this->_endereco;}
}
