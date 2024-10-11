<?php
//vai ser disparado assim quer eu tentar acessar uma classe
//E vai retornar no paramentro da funcao o caminho onde ela esta
spl_autoload_register(function ($class) {

    //Vai retornar o caminho do arquivo da classe que quero acessar
    //Vai fazer a troca para colocar 'src' da minha pasta e .php
    //E uma maneira dinamica de fazer o required
    $caminho = str_replace('Alura\\Banco', 'src', $class) . '.php';

    //Verificando se o caminho vai ser verdadeiro
    if(file_exists($caminho))
    {
        //Fazendo o required do caminho dinamicamente
        require_once $caminho;
    }
});