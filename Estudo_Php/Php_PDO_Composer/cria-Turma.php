<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infrastructure\Persistence\connectionCreator;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

//Fazendo a conecao com o banco sqlite
$connection = connectionCreator::createConnection();

//Passando a conecao para o repositorio
$studentRepository = new PdoStudentRepository($connection);

//Iniciando a transicao no banco, para ter mais seguranca quando for fazer operacoes no banco
$connection->beginTransaction();

try {
    $student1 = new Student(
        null,
        'Nico',
        new DateTime('1998-03-07')
    );

    //Salvando esse estudante no banco
    $studentRepository->save($student1);

    $student2 = new Student(
        null,
        'Mara',
        new DateTime('1997-02-06')
    );

    //Salvando esse estudante no banco
    $studentRepository->save($student2);

    //Fazendo o commit para enviar as peracoes ja 'verificadas' para o banco
    //Posso utilizar o rollback para poder nao aplicar os comandos no banco
    $connection->commit();

} catch (PDOException $e)
{
    echo $e->getMessage();
    $connection->rollBack();
}

