<?php

require_once 'vendor/autoload.php';


use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


//Passando a url base
$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crwaler = new Crawler();

$buscador = new Buscador($client,$crwaler);
$cursos = $buscador->buscarCurso('/cursos-online-programacao/php');

foreach ($cursos as $curso)
{
    echo $curso . PHP_EOL;
}