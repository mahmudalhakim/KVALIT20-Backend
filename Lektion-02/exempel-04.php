<h1>Arbeta med PHP Formulär</h1>
<h2>Skicka en POST-Request via ett formulär</h2>

<form action="exempel-05.php" method="post">

    Vad heter du? 
    <br>
    
    <input type="text" name="firstname">

    <input type="hidden" name="id" value="123">

    <input type="submit" value="Skicka">

</form>