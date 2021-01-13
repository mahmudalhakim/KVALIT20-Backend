<?php
/**
 * Att arbeta mot befintliga servrar
 * ---------------------------------
 * Hämta alla användare (users) från JSONPlaceholder
 * Visa en HTML-lista över användare
 */

// 1. Ange en endpoint/resurs
$url = "https://jsonplaceholder.typicode.com/users";

// 2. Hämta data i JSON-format (en sträng)
$json = file_get_contents($url);

// Testa att skriva ut strängen (temporärt)
// echo $json;

// 3. Konvertera JSON till en PHP-Array
// Takes a JSON encoded string and converts it into a PHP variable.
// https://www.php.net/manual/en/function.json-decode
$array = json_decode($json, true);

// Testa att skriva ut arrayen (temporärt)
echo "<pre>";
// print_r($array);
// echo "</pre>";

// 4. Välj data från arrayen
foreach ($array as $key => $value) {
    // echo "Key: " . $key; // 0123456789
    // echo '<hr>';
    // echo "Value: ";
    // print_r($value); // OBS! $value är arrayer
    // echo '<hr>';
    echo "Name: " . $value['name'];
    echo '<br>';
}




