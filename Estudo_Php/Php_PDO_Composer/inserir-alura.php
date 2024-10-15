<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\connectionCreator;

$pdo = connectionCreator::createConnection();

$student = new Student(null,'Algusto',new DateTimeImmutable('2011-01-14'));

//Query sql para criar um estudante
$slqInsert = "Insert into students (name,brith_date) values 
            ('{$student->name()}','{$student->birthDate()->format('Y-m-d')}')";


echo "{$slqInsert}";

//Executa um comando sql e retorna o numero de linhas afetadas
var_dump($pdo->exec($slqInsert));