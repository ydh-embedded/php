<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generatoren und nullbare Typen</title>
</head>
<body>
  <h1>Generatoren und nullbare Typen</h1>
  <h2>Generatoren</h2>
  <?php
    
  function wuerfelGenerator() {
    for( $i = 1; $i <= 10; $i++ ) {
      $erg = random_int( 1,6 );
      // yield anstelle von return liefert einen Rückgabewert, beendet die Funktion aber nicht
      yield "$erg";
    }
  }

  echo '<p>';
  
  // Generatoren liefern als Rückgabe immer ein Objekt, über welches iteriert werden kann
  
  
  echo '</p>';
    
  ?>

  <h2>Nullbare Typen</h2>

  <?php
    
  function ausgabe( array $a):string {
    if( is_null($a)) {
      return 'Keine Werte gefunden';
    }
    $ausg = '';
    foreach ($a as $w) { $ausg .= "$w, "; }
    return $ausg;
  }

  
    
  ?>
</body>
</html>