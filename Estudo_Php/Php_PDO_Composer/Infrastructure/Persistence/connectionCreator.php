<?php
 
namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class connectionCreator
{
    //Faz a conecao com o sqlite
    public static function createConnection(): PDO
    {
        $caminhoBanco = __DIR__ ."/../../banco.sqlite";
        $connection =  new PDO('sqlite:' . $caminhoBanco);

        //Adcionando o atributo para ele verificar se possui algum tipo de erro
        //Dando um erro generico
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

    //Posso ter outros metodos com outras conecoes
    
}