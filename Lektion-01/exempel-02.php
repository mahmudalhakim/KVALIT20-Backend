<?php

    // Konstanter
    define("SITE_TITEL" , "Web Academy AB");

    // Variabler
    $name = "Mahmud";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exempel 2</title>
</head>
<body>

<h1>PHP - Exempel 2</h1>
<h1>Variabler och konstanter</h1>

<h2> <?php echo SITE_TITEL ?> </h2>

<?php

echo "<h3>Hello $name!</h3>";

// Escape-tecken t.ex. \$
echo "<h3>Hello \$name!</h3>";

// OBS! Enkla citat här nere
echo '<h3>Hello $name!</h3>';

// Konkatenering i PHP (OBS! En punkt)
echo "Antal tecken: " . strlen($name) . "<br>";

?>

</body>
</html>


