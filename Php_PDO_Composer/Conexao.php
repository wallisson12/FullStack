<?php

//Essa é a classe que permite se conectar com o banco de dados
// 1 paramentro - string de conexao, aceita usuario e senha
//Deixando o caminho absoluto
$caminhoBanco = __DIR__ ."/banco.sqlite";
$pdo = new PDO('sqlite:' . $caminhoBanco);

echo 'Conectei';

//Executando uma query em sql para criar uma tabela
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, brith_date TEXT);');