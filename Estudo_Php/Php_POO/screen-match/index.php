<?php

require_once __DIR__ . "/src/Modelo/Filme.php";

$filme = new Filme();

$filme->nome = "Nome Legal";
$filme->anoLancamento = 2021;
$filme->genero = "a";

$filme->AvaliaFilme(3.2);
$filme->AvaliaFilme(4.3);
$filme->AvaliaFilme(7.1);


var_dump($filme);


echo $filme->MediaFilme(); 