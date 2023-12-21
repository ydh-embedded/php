<!--    #region head from function.inc.php         -->

    <!DOCTYPE html>
    <html lang="de">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktion Addition und Multiplikation</title>
    </head>
    <body>


<?php
//?     Wir erstellen ein Funktion fAddiere()
        function fAddiere(int $Summand1 , int $Summand2 , int $optional = 0 ){

            $Ergebnis = $Summand1 + $Summand2 + $optional ;
            echo "<p>Addition ergibt aus den Werten: $Summand1 und $Summand2 das \$Ergebnis: $Ergebnis.</p>";
            return $Ergebnis;
        }

//?     Wir erstellen ein Funktion fMultipliziere()
        function fMultipliziere(int $Multiplikator1 , int $Multiplikator2 , int $optional = 1 ){

            $Produkt = $Multiplikator1 + $Multiplikator2 + $optional ;
            echo "<p>Multiplikation ergibt aus den Werten: $Multiplikator1 und $Multiplikator2 das \$Produkt: $Produkt.</p>";
            return $Produkt;
        }


























?>




























    
</body>
</html>