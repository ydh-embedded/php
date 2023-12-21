<?php
        include_once 'function.inc.php' ;
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formular-Senden</title>
    </head>
    
<body>
        
<h1>Übung: Addition mit eingebundener Funktion</h1>
<h3>Bitte geben Sie Zwei bzw. Drei Zahlen ein und senden Sie das Formular ab:</h3>
<!--<form action=""              method="post"> -->
<form action="form_html_to_.php" method="post">

    <label for="text_id">Input</label>

    <p> <!--    Zahl 1:                            -->
        <label for="Zahl_1">Zahl_1</label>
        <input type="text" name="Zahl_1" id="text_id">
    </p>

    <p> <!--    Zahl 2:                            -->
        <label for="Zahl_2">Zahl_2</label>
        <input type="text" name="Zahl_2" id="text_id">
    </p>

    <p> <!--    Zahl 3:    (optional)              -->
        <label for="Zahl_3">Zahl_3 (optional)</label>
        <input type="text" name="Zahl_3" id="text_id">
    </p>

    <p> <!--    Absenden / Submit                  -->
        <input type="submit" value="Absenden">
    </p>



<?php
    
    
    var_dump($_REQUEST);
    
?>












</form>
































</body>
</html>