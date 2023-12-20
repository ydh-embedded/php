<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen in php</title>
</head>

<body>

<h2>Wir erstellen eine Funktion:</h2>
    <?php

        function fHallo(){
            echo ' Hallo !' ;
        }
        function fHallo2($name){
            echo "<p> Hallo $name </p>"    ;
        }
        function fSumme( $a ,$b ){
            $ergebnis= $a + $b ;
            return $ergebnis ;
        }
    ?>

<h2>Wir rufen eine Funktion auf :</h2>

<?php
    
    fHallo();
    fHallo2('Bernd');      //? Wir verwenden hier den Funktions-Parameter
    fHallo2('Anna');
    fHallo2('Nici');
    
    fHallo2($name);     //! Achtung hier wird die Feld Variable aufgerufen nicht der Funktions-Paramter!

    


?>
















































</body>
</html>