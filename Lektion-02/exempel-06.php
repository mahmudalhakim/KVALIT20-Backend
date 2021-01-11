<h1>Arbeta med PHP Formulär</h1>
<h2>Skicka en GET- och POST-Request via ett formulär</h2>

<form action="?id=1234" method="post">

    Vad heter du? <br>
    <input type="text" name="name">

    <input type="submit" value="Skicka">

</form>

<?php

function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

print_array($_GET);
print_array($_POST);