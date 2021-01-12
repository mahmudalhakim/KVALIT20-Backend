<?php

include('Name.php');

header("Content-Type: application/json; charset=UTF-8");

$firstNamesMale = array("Mahmud", "Kalle", "Erik", "Adam", "Fredrik");
$firstNamesFemale = array("Astrid", "Yasmin", "Sara", "Maria", "Åsa");
$lastNames = array("Al Hakim", "Öberg", "Ericsson", "Anka", "Söderberg", "Gustavsson", "Nilson", "Lindgren", "Nyström", "Hakimson",);

$limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;

$names = array();

while (count($names) < $limit) {

    if (rand(0, 1) == 0)
        $name = new Name($firstNamesMale[rand(0, 4)], $lastNames[rand(0, 9)], 'Male');
    else
        $name = new Name($firstNamesFemale[rand(0, 4)], $lastNames[rand(0, 9)], 'Female');

    array_push($names, (array) $name);
}

shuffle($names);

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);