<?php

/**
 * WebshopAPI
 * En egenutvecklad version av Api
 */
header("Content-Type: application/json; charset=UTF-8");

include('product.php');
include('productArray.php');


$products = array ();
for ($i=0; $i <10 ; $i++) {
$product = new product(
    $name[$i], $description[$i], $price[$i], $image[$i]
);

    array_push($products, $product -> toArray());
}


// 4. Konvertera PHP-arrayen till en JSON-string.
echo json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
