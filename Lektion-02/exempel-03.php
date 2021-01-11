<h1>Arbeta med PHP Formulär</h1>
<h2>Skicka en GET-Request via ett formulär</h2>

<form action="#" method="get">

    Vad heter du? <br>
    <input type="text" name="firstname">

    <input type="submit" value="Skicka">

</form>

<?php

function print_array(){
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
}

print_array($_GET);

$firstname = $_GET['firstname'] ?? "";
echo "<h1>Hej $firstname</h1>";