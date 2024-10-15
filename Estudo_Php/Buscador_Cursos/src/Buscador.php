<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private ClientInterface $httpClient;
    private Crawler $crawler;
    public function __construct(ClientInterface $httpClient,Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscarCurso(string $url) : array
    {
        //Fazendo uma requisicao para a url da alura e ja adcionado o corpo dessa resposta para o crawler
        $this->crawler->addHtmlContent(($this->httpClient->request('GET', $url))->getBody());

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');

        $cursos = [];

        foreach ($elementosCursos as $elemento)
        {
            $cursos [] = $elemento->textContent;
        }

        return $cursos;
    }
}