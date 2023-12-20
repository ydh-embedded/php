<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fehlerbehandlung</title>
</head>

<body>
  <h1>Fehlerbehandlung</h1>
  <?php
    
    /* Variable unbekannt */
    // $x=4;
    try {                                               //versuche
      if( ! isset($x) ) {                                 // wenn $x nicht existiert
        throw new Exception('Variable unbekannt');      // wirf ein neues Ausnahme-Objekt, übergib eine Zeichenkette
                                                          // und springe sofort zum catch-Teil
                                                          // folgende Anweisungen im try-Teil werden nicht mehr ausgeführt
      }
      echo "Variable $x<br>";
    } catch (Exception $e) { // fang das geworfene Ausnahme-Objekt (als Parameter) auf

      echo $e->getMessage() . '<br>'; // gib die Meldung des Ausnahmeobjektes aus

      echo 'Hier können weitere Informationen für den Benutzer ausgegeben werden.<br>';

      // Das komplette Ausnahme-Objekt
      echo '<pre>', var_dump( $e ), '</pre>';
    } finally {
      /* Optionale Anweisungen, die auf jeden Fall ausführt werden */
      echo 'Ende, Variable unbekannt<br>';
    }

    /* Division durch 0 */
    $x = 42;
    $y = 0;

    try {
      if( $y == 0) {
        throw new Exception('Division durch 0');
      }
      $z = $x / $y;
      echo "Division $x / $y = $z<br>";
    } catch (Exception $e) {
      echo $e->getMessage() . '<br>';
    }

    /* Zugriff auf unbekannte Funktion */
    try {
      if( ! function_exists('testFkt')) {
        throw new Exception('Funktion unbekannt');
      }
      testFkt();
    } catch (Exception $e) {
      echo $e->getMessage() . '<br>';
    }
    
  ?>
</body>

</html>