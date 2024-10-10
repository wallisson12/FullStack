<?php

require_once __DIR__ . "/src/Modelo/Titulo.php";
require_once __DIR__ . "/src/Modelo/Genero.php";
require_once __DIR__ . "/src/Modelo/Filme.php";
require_once __DIR__ . "/src/Modelo/Series.php";
require_once __DIR__ . "/src/Calcular/CalcularDuracaoMaratona.php";

$filme = new Filme("n",Genero::Acao,2019,30);

$filme->AvaliaFilme(3.2);
$filme->AvaliaFilme(4.3);
$filme->AvaliaFilme(7.1);


var_dump($filme);


echo $filme->MediaFilme() . PHP_EOL; 


$serie = new Series("teste",Genero::Comedia,2030,15,20,5);

var_dump($serie);

echo $serie->GetAnoLancamento() . PHP_EOL;


$calculadora = new CalcularDuracaoMaratona();

$calculadora->Inclui($filme);
$calculadora->Inclui($serie);

echo $calculadora->GetDuracaoMaratona();