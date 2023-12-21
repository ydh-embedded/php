<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung-K7</title>
</head>


<body>

<h1>Übung: Berechnungen mit Hilfe von Funktionen </h1>
<h2>wir geben Zwei Funktionen aus</h2>


<?php
//?     Wir erstellen ein Funktion fAddiere()
        function fAddiere(int $Summand1 , int $Summand2){

            $Ergebnis = $Summand1 + $Summand2 ;
            echo "<p>Addition ergibt aus den Werten: $Summand1 und $Summand2 das \$Ergebnis: $Ergebnis.</p>";
            return $Ergebnis;
        }
        
//?     Wir erstellen ein Funktion fMultipliziere()
        function fMultipliziere(int $Multiplikator1 , int $Multiplikator2){
            
            $Produkt = $Multiplikator1 + $Multiplikator2 ;
            echo "<p>Multiplikation ergibt aus den Werten: $Multiplikator1 und $Multiplikator2 das \$Produkt: $Produkt.</p>";
            return $Produkt;
        }


























?>



























    
</body>
</html>