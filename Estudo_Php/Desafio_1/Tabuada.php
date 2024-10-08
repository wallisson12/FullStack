<?php

//Exibir a tabuada de qualquer numero

$valor = 2;

for($i=1;$i<=10;$i++)
{
    $result = $valor * $i;
    echo "$valor x $i = $result" . PHP_EOL;
}