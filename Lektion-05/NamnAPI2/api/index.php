<?php

// 1. Skapa en HTTP-header med innehållstypen JSON (Content-Type).
header("Content-Type: application/json; charset=UTF-8");

// 2. Skapa två PHP-arrayer för att lagra förnamn och efternamn.
$firstNames = ["Åsa", "Mahmud", "Kalle", "FN 4",  "FN 5", "Adam"];
$lastNames = ["Öberg", "Al Hakim", "LN 3", "LN 4", "LN 5", "Ericsson"];

// 3. Skapa 10 olika namn (förnamn och efternamn)
//    och spara dessa i en ny array som heter names.

$names = array();

for ($i=0; $i < 10 ; $i++) { 
  
    $name = array(
        "firstname" => $firstNames[rand(0, count($firstNames) - 1)] ,
        "lastname" => $lastNames[rand(0, count($lastNames) - 1)]
    );
    
    array_push($names, $name);

}

// 4. Konvertera PHP-arrayen till en JSON-string.
$json = json_encode($names, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

// Skicka JSON till klienten.
echo $json;