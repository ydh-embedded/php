<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schleifen</title>
</head>

<body>
  <h1>Schleifen</h1>
  <h2>1. Die <code>while</code>-Schleife</h2>

  <h3>1.1 kopfgesteuert</h3>

  <?php

  $zahl = 10;

  echo '<p>';
  while ($zahl <= 100) {
    echo "$zahl<br>";
    $zahl += 5;
  }
  echo '</p>';

  ?>

  <h3>1.2 fußgesteuert</h3>

  <?php
    
    echo '<p>';
    do {
      echo "$zahl<br>";
      $zahl += 5;
    } while ($zahl <= 100);
    echo '</p>';
    
    
  ?>

  <h2>2. <code>for</code>-Schleife</h2>

  <?php
    
  for ($groesse = 25; $groesse >= 10; $groesse -= 5) {
    echo "<p style='font-size:" . $groesse . "px'>Schriftgröße $groesse px.</p>";
  }
    
  ?>

  <h2>3. <code>break</code> und <code>continue</code></h2>

  <?php 
  
  $budget = 50;
  $einzelpreis = 9;
  $menge = 1;

  while( $menge <= 15 ) {
    $gesamtpreis = $einzelpreis * $menge;
    if( $gesamtpreis > $budget ) {
      // Wenn Budget erschöpft: Abbruch
      break;
    }

    echo "<p>$menge Stück: $gesamtpreis EUR</p>";
    $menge++;
  }

  $zaehler = 5;
  for( $nenner = -2; $nenner <= 2; $nenner++ ) {
    if( $nenner === 0 ) {
      echo '<p>Division durch 0 ist nicht erlaubt.</p>';
      continue; // es wird zum nächsten Schleifendurchlauf gesprungen
    }
    $erg = $zaehler / $nenner;
    echo "<p>$zaehler / $nenner = $erg.</p>";
  }
  
  ?>
</body>

</html>