<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\connectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;


/*
$pdo = connectionCreator::createConnection();

//Fazendo a busca e retronando um objeto pdostatement, onde possui algums metodos
//Como vai retornar um arryarAssociativo, posso percorrer e criar um array de estudantes
$statement = $pdo->query('Select * from students');
$studentList = $statement->fetchAll(PDO::FETCH_ASSOC);

//Lista de alunos do banco
$listS = [];


//Percorrendo o array e criando um array de tipo do que esta armazenado na tabela
foreach($studentList as $student)
{
    $listS[] = new Student(
        $student['id'],
        $student['name'],
        new DateTimeImmutable($student['brith_date'])
    );
}

var_dump($listS);
*/

//Modelo mais otimizado
$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);

$studentList = $repository->allStudents();

var_dump($studentList);


