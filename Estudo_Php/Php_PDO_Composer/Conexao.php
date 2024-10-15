<?php

//Essa é a classe que permite se conectar com o banco de dados
// 1 paramentro - string de conexao, aceita usuario e senha
//Deixando o caminho absoluto
$caminhoBanco = __DIR__ ."/banco.sqlite";
$pdo = new PDO('sqlite:' . $caminhoBanco);

echo 'Conectei';

$pdo->exec("
    
    CREATE TABLE IF NOT EXISTS students(
        
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        brith_date TEXT
    );
");

//Criando a referencia entre a tabela de telefones e a de estudantes
$pdo->exec("
    
    CREATE TABLE IF NOT EXISTS phones(
        
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        area_code TEXT,
        number TEXT,
        student_id INTEGER, FOREIGN KEY (student_id) REFERENCES students(id)
    );
");

//Adcionando varios numero de telefone para um estudante
$pdo->exec("INSERT INTO phones (area_code,number,student_id) 
            VALUES ('21, 999999999, 1'),('22, 999999999, 1'),('23, 999999999, 1')");

//Executando uma query em sql para criar uma tabela
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, brith_date TEXT);');