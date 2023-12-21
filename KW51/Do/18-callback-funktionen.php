<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Callback-Funktionen</title>
</head>
<body>
  <h1>Callback-Funktionen (Rückruf-Funktionen)</h1>
  <?php
    
  // normale Funktionsdefinitionen
  function haelfte($x) {
    return $x / 2;
  }

  // letzter Parameter muss eine Funktion sein
  function ausgabe( $von, $bis, $schritt, $fkt ) {
    $ausg = '<p>';
    for( $i = $von; $i < $bis; $i += $schritt ) {
      $ausg .= $fkt($i) . ', ';
    }
    $ausg .= '</p>';
    return $ausg;
  }
  
  // Übergabe als Funktionsreferenz
  echo ausgabe( 5, 14, 2, 'haelfte'); 

  // Übergabe als anonyme Funktion
  

  // Übergabe als Pfeilfunktion
  
    
  ?>
</body>
</html>