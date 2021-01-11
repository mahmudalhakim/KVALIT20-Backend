<?php
if(strtoupper($_SERVER['REQUEST_METHOD']) != 'POST'){
    header('Location: index.php');
    //http_response_code(400);
    exit('Bad Request');
}

echo "Hello " . htmlspecialchars($_POST['firstname']);