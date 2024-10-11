<?php

require_once 'AutoLoad.php';

use Alura\Banco\Modelo\{CPF,Endereco};
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Conta\{ContaPoupanca,ContaCorrente};




$enderecoo = new Endereco("um lugar","24","uma rua legal",
                        "um endereco","bairoo");

$vinicius = new Titular('Vinicius Dias',new CPF('123.456.789-10'),$enderecoo);
$primeiraConta = new Conta($vinicius);
$primeiraConta->deposita(500);
$primeiraConta->saca(300); // isso é ok


echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;


$patricia = new Titular('Patricia',new CPF('698.549.548-10'),$enderecoo);
$segundaConta = new Conta($patricia);
var_dump($segundaConta);

$outroEndereco = new Endereco("A","2","b","c","d");

$outra = new Conta(new Titular('Abcdefg',new CPF('123.654.789-01'),$outroEndereco));
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();
