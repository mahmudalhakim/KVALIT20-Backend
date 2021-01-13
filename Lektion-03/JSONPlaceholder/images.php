<?php
/**
 * Att arbeta mot befintliga servrar
 * ---------------------------------
 * Hämta 10 bilder från JSONPlaceholder
 * 
 */

// 1. Ange en endpoint/resurs
$url = "https://jsonplaceholder.typicode.com/albums/1/photos";

// 2. Hämta data i JSON-format (en sträng)
$json = file_get_contents($url);

// Testa att skriva ut strängen (temporärt)
// echo $json;

// 3. Konvertera JSON till en PHP-Array
// Takes a JSON encoded string and converts it into a PHP variable.
// https://www.php.net/manual/en/function.json-decode
$array = json_decode($json, true);

// Testa att skriva ut arrayen (temporärt)
// echo "<pre>";
// print_r($array);
//echo "</pre>";

// 4. Välj data från arrayen
foreach ($array as $key => $value) {
    if($key == 10) break;
    echo "<img src='$value[thumbnailUrl]' >";
}