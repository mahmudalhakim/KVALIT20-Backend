<?php declare(strict_types=1); ?>


<h1>Exempel på strikta typer</h1>


<?php

function addNumbers(int $a , int $b) : int {
    return $a + $b;
}

echo addNumbers(11,22);

// OBS! Fatal Error här nedan!
echo addNumbers(11,'22');