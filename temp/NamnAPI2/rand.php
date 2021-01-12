<?php

$array = array("one", "two", "three", "four", "five", "six");
echo $array[array_rand($array, 1)] . '<hr>';


$firstNamesMale = array("Mahmud", "Kalle", "Erik", "Adam", "Fredrik");

$v = $firstNamesMale[array_rand($firstNamesMale, 1)];

var_dump($v);

?>