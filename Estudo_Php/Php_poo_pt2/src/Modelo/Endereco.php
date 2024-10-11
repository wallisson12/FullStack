<?php

namespace Alura\Banco\Modelo;
class Endereco
{
    //Propriedades
    private string $_nome;
    private string $_numero;
    private string $_rua;
    private string $_endereco;
    private string $_bairro;

    //Construtor
    public function __construct(string $nome, string $numero, string $rua, string $enderecoo, string $bairro)
    {
        $this->_nome = $nome;
        $this->_numero = $numero;
        $this->_rua = $rua;
        $this->_endereco = $enderecoo;
        $this->_bairro = $bairro;
    }

    //Acessores
    public function GetNome(): string {return $this->_nome;}

    public function GetNumero(): string {return $this->_numero;}

    public function GetRua(): string {return $this->_rua;}

    public function GetEndereco(): string {return $this->_endereco;}

    public function GetBairro(): string {return $this->_bairro;}



}