<?php

$Peso = 50;
$Altura = 1.30;

$result = $Peso/($Altura**2);

if($result < 18)
{
    echo "Seu Imc eh: $result" . PHP_EOL;
    echo "ABAIXO" . PHP_EOL;
    
} else if($result < 25)
{
    echo "Seu Imc eh: $result" . PHP_EOL;
    echo "MEDIA" . PHP_EOL;
}
else
    echo "Seu Imc eh: $result" . PHP_EOL;
    echo "ACIMA". PHP_EOL;