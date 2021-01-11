<?php

echo "<h1>Request-metoden som används just nu är: ";
echo $_SERVER['REQUEST_METHOD'];
echo "</h1>";


?>

<form action="exempel-10.php" method="post">
<input type="text" name="firstname">
<input type="submit" value="Send">
</form>

<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    echo "Hello " . $_POST['firstname'];
}