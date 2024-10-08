<?php

//Exibir os numeros impares ate o 100

for($i = 0; $i <= 100 ; $i++)
{
    
    if(($i % 2) != 0)
    {
        echo "O numero $i eh impar" . PHP_EOL;
    }
}

