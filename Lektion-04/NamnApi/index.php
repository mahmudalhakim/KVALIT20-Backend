<?php

include 'App.php';

$count = $_GET['antal'] ?? '10';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $count ?> Namn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body class="container">

    <h1 class="display-1 text-center"><?php echo $count ?> Namn
        från <a href="https://namnapi.se/">namnapi.se</a></h1>


    <div class="text-center">
        <span class="badge rounded-pill bg-success text-light">
            <a class="text-light" href="?antal=1">1</a>
        </span>
        <span class="badge rounded-pill bg-success text-light">
            <a class="text-light" href="?antal=5">5</a>
        </span>
        <span class="badge rounded-pill bg-success text-light">
            <a class="text-light" href="?antal=10">10</a>
        </span>
        <span class="badge rounded-pill bg-success text-light">
            <a class="text-light" href="?antal=20">20</a>
        </span>
        <span class="badge rounded-pill bg-success text-light">
            <a class="text-light" href="?antal=50">50</a>
        </span>

    </div>
    <hr>


    <?php App::main($count); ?>

</body>

</html>