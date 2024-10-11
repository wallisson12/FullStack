<?php

class Titular
{
    private $cpf;
    private $nome;
    private Endereco $_endereco;
    public function __construct(CPF $cpf, string $nome,Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->_endereco = $endereco;
    }

    //Acessores
    public function recuperaCpf(): string {return $this->cpf->recuperaNumero();}

    public function recuperaNome(): string {return $this->nome;}

    public function recuperaEndereco():Endereco{return $this->_endereco;}

    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}
