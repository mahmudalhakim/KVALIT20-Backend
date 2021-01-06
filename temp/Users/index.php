<?php include_once('App.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css">
    <title>API Demo</title>
    <style>
        .address {
            float: left;
            padding: 10px;
            margin: 5px;
            width: 200px;
            height: 200px;
            border: 1px double grey;
        }
    </style>
</head>
<body class="container">
    <div >
        <?php App::main(); ?>
    </div>
</body>
</html>