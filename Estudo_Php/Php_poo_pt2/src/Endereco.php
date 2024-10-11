<?php

class Endereco
{
    //Propriedades
    private string $_nome;
    private string $_numero;
    private string $_rua;
    private string $_endereco;
    private string $_bairro;

    //Construtor
    public function __construct(string $nome, string $numero, string $rua, string $endereco, string $bairro)
    {
        $this->_nome = $nome;
        $this->_numero = $numero;
        $this->_rua = $rua;
        $this->_endereco = $endereco;
        $this->_bairro = $bairro;
    }

    //Acessores
    public function getNome(): string {return $this->_nome;}

    public function getNumero(): string {return $this->_numero;}

    public function getRua(): string {return $this->_rua;}

    public function getEndereco(): string {return $this->_endereco;}

    public function getBairro(): string {return $this->_bairro;}



}