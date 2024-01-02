<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String-Funktionen</title>
</head>
<body>
  <h1>Zeichenketten-Funktionen</h1>
  <h4>Nach einer Berechnung erhalten Sie eine Fließkommazahl mit diversen Nachkommastellen,<br> 
      Formatieren Sie die Ausgabe, sodass 3 Stellen vor dem Komma
und 5 Nachkommastellen ausgegeben werden.</h4>

  <?php

    /* Die Funktion number_format()
    Synthax: number_format(Zahl, Stellen, 'Nachkomma', 'Tausender') */

    $zahl_uebung_1  = 78.123456789    ;
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> $zahl_uebung_1</p>";
    echo '<p><em>Nachher: Insgesamt 9 Zeichen = 3 vor dem Komma & 5 hinter dem Komma:</em></p>';
    echo '<p></p>';
    echo sprintf('<p> <b>%09.5f</b></p>', $zahl_uebung_1);
    
    
    
    $zahl_uebung_1_1  = 78.98765321    ;
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> $zahl_uebung_1_1</p>";
    echo '<p><em>Nachher: Insgesamt 9 Zeichen = 3 vor dem Komma & 5 hinter dem Komma:</em></p>';
    echo '<p></p>';
    echo sprintf('<p> <b>%09.5f</b></p>', $zahl_uebung_1_1);
    
  ?>

