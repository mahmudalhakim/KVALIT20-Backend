<?php

function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

print_array($_POST);

$firstname = $_POST['firstname'] ?? "";
echo "<h1>Hej $firstname</h1>";