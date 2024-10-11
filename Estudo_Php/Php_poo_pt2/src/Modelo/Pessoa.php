<?php

namespace Alura\Banco\Modelo;
class Pessoa
{
    protected string $_nome;
    private CPF $_cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->validaNomeTitular($nome);
        $this->_nome = $nome;
        $this->_cpf = $cpf;
    }

    public function GetNome(): string {return $this->_nome;}

    public function GetCpf(): string {return $this->_cpf->recuperaNumero();}

    protected function validaNomeTitular(string $nomeTitular) : void
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

}