<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datumsfunktionen</title>
</head>

<body>
<h2>Aufgabe 1.0<br><code>date()</code></h2>
<h4>Die Funktion date() liefert die Tagesnamen standardmäßig in englischer Sprache zurück. 
Lassen Sie sich den aktuellen Wochentag mittels setlocale() und strftime() in 
deutscher Sprache ausgeben</h4>
<p></p>
  <?php

    $heute = time() ;
    $heute_de = strftime(true) ;



    echo '<p>aktueller Zeitstempel: ' . time() . '</p>';
    echo '<p>Heute ist der ' . date('d.m.Y', $heute) . '</p>';
    //echo '<p>Heute in Germany ist der ' . setlocale($heute_de) . '</p>';
  
  ?>



</body>
</html>