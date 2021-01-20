<?php

/**
 * NamnAPI V.2
 * En egenutvecklad version av https://namnapi.se/
 * 
 * Date: 2021-01-20
 * Copyright: MIT
 * Contact: Mahmud Al Hakim
 * https://github.com/mahmudalhakim/
 */

header("Content-Type: application/json; charset=UTF-8");

include('Name.php');
include('namesArrays.php');

$limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;

$names = array();

while (count($names) < $limit) {

    if (rand(0, 1) == 0) {

        $name = new Name(
            $firstNamesMale[rand(0, count($firstNamesMale) - 1)],
            $lastNames[rand(0, count($lastNames) - 1)],
            'male'
        );
    } else {

        $name = new Name(
            $firstNamesFemale[rand(0, count($firstNamesFemale) - 1)],
            $lastNames[rand(0, count($lastNames) - 1)],
            'female'
        );
    }

    array_push($names, $name->toArray());
}

shuffle($names);

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
