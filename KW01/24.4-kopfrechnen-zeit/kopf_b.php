<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Kopfrechnen, Auswertung</title>
</head>
<body>
<?php
echo "<p><b>Kopfrechnen</b></p>";

/* Der Spieler wird mit seinem Namen begrüßt. */
echo "<p>Hallo <b>" . $_POST["spielername"] . "</b>, Ihr Ergebnis</p>";

/* In einer Schleife werden die fünf Eingaben in Zahlen umgewandelt
   und mit den fünf richtigen Ergebnissen verglichen.
   Dabei wird die Anzahl der richtigen Eingaben mitgezählt. */
$richtig = 0;
for($i=0; $i<5; $i++)
   if(floatval($_POST["ein"][$i]) == $_POST["erg"][$i])
      $richtig ++;


      /* Die Anzahl der richtigen Eingaben wird ausgegeben. */
echo "<p>$richtig von 5 richtig</p>";
?>
<!-- Der Hyperlink führt wieder zum ersten Formular, damit der Spieler weitermachen kann. -->
<p><a href="kopf.html">Zum Start</a></p>
</body>
</html>
