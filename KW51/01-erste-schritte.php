<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallo PHP </title>
</head>
<body>
    

<!-- PHP - Bereich öffnen -->

<?php

/* Mehrzeiliger Kommentar */

// einzeriliger Kommentar

# alternativer Kommentar

/*
        Die Anweisung echo ist ein Sprach-Konstrukt
        es kann Zeichenketten in das temporäre html Dokument
*/

    echo' <p> Hallo, mein Erster Absatz über PHP. </p>';

    /* 
    mögliche Syntax für das echo
    Strings ( Zeichenketten )können entweder als mehrere Argumente oder miteinander verunden als einzelnes Argument übergeben werden
    */
    echo 'Dieser' , 'String' , 'besteht' , 'aus' , 'mehreren Argumenten/Parameter', "\n";
    echo 'Dieser' . 'String' . 'wurde' . 'mit' , 'Der String-Verkettung erzeugt', "\n";
?>


    <?= '<h2> Direkte Ausgabe </h2>' ;
    ?>



</body>
</html>