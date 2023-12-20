<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isset</title>
</head>
<body>
    <?php
#region alte Schreibweise
        if(isset($x))   echo "1: $x<br>"                    ;
        else            echo "Variable nicht vorhanden <br>";   //  Vor derZuweisung existiert die Variable noch nicht
        
        $x = 42 ;
        if(isset($x))   echo "2: $x<br>"                    ;
        else            echo "Variable nicht vorhanden <br>";   //  Nach der Zuweisung des Wertes existiert die Variable
        
        unset($x) ;
        if(isset($x))   echo "3: $x<br>"                    ;
        else            echo "Variable nicht vorhanden <br>";   //  Nach der Löschung des Wertes existiert die Variable nicht mehr
        
        $x = 42 ;
        if(isset($x))   echo "4: $x<br>"                    ;
        else            echo "Variable nicht vorhanden <br>";   //  Nach der Zuweisung existiert die Variable wieder
#endregion
//! ______________________________________________________________________________________________________________________________________________
//?     Neue Schreibweise

        $x = null   ;

        if(isset($x))   echo "5: $x<br>"                    ;
        else            echo "5: Variable nicht vorhanden"  ;   //  Nach der Löschung des Wertes ( $x = null ) existiert die Variable nicht mehr















    ?>
</body>
</html>