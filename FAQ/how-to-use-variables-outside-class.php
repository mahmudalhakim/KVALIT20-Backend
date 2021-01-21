<?php

// Fråga
// Hur kommer jag åt variabler som ligger utanför klassen?
// och hur kommer jag åt en array som ligger en i egen fil?

$myName = "Mahmud";
include_once 'myArray.php';

class TestClass{

    public function __construct()
    {
        // Svar:
        // Alla globala variabler ligger i en superglobal array
        // som heter $GLOBALS
        
        echo "<h1>GLOBALS</h1>";
        print_r($GLOBALS);
        echo "<hr>";
        
        echo "<h1>myName</h1>";
        print_r($GLOBALS['myName']);
        echo "<hr>";
        
        echo "<h1>myArray</h1>";
        print_r($GLOBALS['myArray']);
    }
}

$obj = new TestClass();