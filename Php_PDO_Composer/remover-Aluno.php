<?php

use Alura\Pdo\Infrastructure\Persistence\connectionCreator;

require_once 'vendor/autoload.php';

$pdo = connectionCreator::createConnection();


$preparedStatement = $pdo->prepare("DELETE from students where id = ?");

$preparedStatement->bindValue(1,1,PDO::PARAM_INT);

var_dump($preparedStatement->execute());