<?php

//Proprio namespace
namespace Alura\Banco\Modelo\Funcionario;

//Trazendo os namespaces onde as classes que preciso estao
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Pessoa;

abstract class Funcionario extends Pessoa
{
    private string $_cargo;
    private float $_salario;

    public function __construct(string $nome, CPF $cpf, string $cargo,$salario)
    {
        //Construtor da classe pai
        parent::__construct($nome,$cpf);
        $this->_cargo = $cargo;
        $this->_salario = $salario;
    }
    public function GetCargo(): string {return $this->_cargo;}
    public function GetSalario(): float {return $this->_salario;}

    public function SetNome($nome) : void
    {
        $this->validaNomeTitular($nome);
        $this->_nome = $nome;
    }

    public function RecebeAumento(float $valorAumento) : void
    {
        if($valorAumento < 0)
        {
            echo "O aumento deve ser positivo";
            return;
        }

        $this->_salario += $valorAumento;
    }

    abstract function CalculaBonificacao(): float;

}