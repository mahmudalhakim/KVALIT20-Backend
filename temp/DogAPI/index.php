<?php include_once('App.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <title>Dog API</title>
</head>

<body class="container-fluid">

    <div class="row">
        <div class="col-sm-3">
            <h1 class="text-center"><a href="index.php">Dog API</a></h1>
            <?php App::main(); ?>
        </div>
        <div class="col-sm-9">
            <?php App::images(); ?>
        </div>
    </div>

    <footer class="text-center">
        <hr>
        <p>Copyright &copy; <?php echo date('Y'); ?> </p>
    </footer>

    <!--  
    Lightbox v2.11.3 by Lokesh Dhakar
    http://lokeshdhakar.com/projects/lightbox2/
    -->
    <script src="js/lightbox-plus-jquery.min.js"></script>

</body>

</html>