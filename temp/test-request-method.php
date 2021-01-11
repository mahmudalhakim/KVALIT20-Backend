<?php

if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
    http_response_code(400);
    //exit("Bad Request");
}
// Vad är http_response_code?
// https://www.php.net/manual/en/function.http-response-code.php


echo "<pre>";
echo "<h2>The method used by your request was
$_SERVER[REQUEST_METHOD] </h2>";

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    print_r($_POST);
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {
    print_r($_GET);
}
echo "</pre>";

// Varför bör man använda strtoupper
// https://stackoverflow.com/questions/10766221/is-serverrequest-method-guaranteed-to-be-uppercase

?>

<a href="?username=Mahmud">Sicka en GET-request</a>

<form action="#" method="POST">
<input type="text" name="username">
<input type="submit" value="Sicka en POST-request">
</form>
