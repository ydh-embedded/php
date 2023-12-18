<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zeitfunktionen</title>
</head>
<body>
  <h1>Zeitfunktionen</h1>
  <h2><code>time()</code></h2>
  <?php
    
    echo '<p>aktueller Zeitstempel: '. time() .'</p>';
    
  ?>

  <h2><code>mktime()</code></h2>
  <?php
    
    /* mktime( Std, Min, Sek, Monat, Tag, Jahr ) */

    $tag = 15;
    $monat = 1;
    $jahr = 1969;

    $start = mktime(0, 0, 0, $monat, $tag, $jahr);
    $diff = time() - $start;
    echo '<p><b>' . (floor($diff / 86400)) . ' Tage</b> liegen zwischen heute (';
    echo date('d.m.Y') . ') und dem ' . date('d.m.Y', $start) . '.</p>';
    
  ?>

  <h2><code>microtime()</code></h2>
  <?php
    
    echo '<p>Funktionsaufruf ohne Parameter: ' . microtime() . '<br>';
    echo 'Funktionsaufruf mit Parameter true: ' . microtime(true) . '</p>';

    echo '<p><i>Berechnung der Quadratwurzeln von 1 - 1.000.000</i><br>';

    $start = microtime(true);
    for($i = 1; $i <= 1000000; $i++) {
      $quadratwurzel = sqrt($i);
    }
    $ende = microtime(true);

    echo 'Ausführungsdauer: ' . ($ende - $start) . ' Sekunden.</p>';
    
  ?>

  <h2><code>checkdate()</code></h2>

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">

    <p>Geben Sie ein beliebiges Datum im Format TT.MM.JJJJ ein:</p>
    <p><input type="text" name="datum" size="10" maxlength="10"></p>
    <p><input type="submit" value="Prüfen"></p>

  </form>
  <?php
    
    // Prüfe ob das Formular gesendet wurde
    if( ! empty( $_POST ) ) {
      // Die einzelnen Teile der Datumsangabe in ein Array überführen
      $data = explode('.', $_POST['datum']);

      // Prüfe das Datum auf korrektes Format und auf das Vorhandensein aller drei Teile
      if( (! checkdate( $data[1], $data[0], $data[2] )) || ( count($data) != 3 ) ) {
        echo '<p>'. $_POST['datum'] .' ist <b>kein</b> korrektes Datum.</p>';
      } else {
        echo '<p>Das Datum '. $_POST['datum'] .' ist korrekt.</p>';
      }
    }
    
  ?>
</body>
</html>