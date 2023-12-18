<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>In Dateien schreiben</title>
</head>

<body>
  <h1>In Dateien schreiben</h1>
  
  <?php
    
    $fh = fopen('bestellung.txt', 'a');

    if( $fh === false ) {
      echo '<p>Datei konnte nicht zum Schreiben geöffnet werden.</p>';
      die('<p>Das Programm wird geschlossen.</p>');
    }

    $name = 'Donald Duck';
    $strasse = 'Entenweg 35';
    $ort = '45 Entenhausen';

    if( fwrite( $fh, "$name\n$strasse\n$ort\n\n" ) ) {
      echo "<p>Folgende Daten wurden geschrieben: $name, $strasse, $ort.</p>";
    } else {
      echo '<p>Das Schreiben der Daten ist fehlgeschlagen.</p>';
    }

    fclose($fh);
    
  ?>

  <h2>Die Funktion <code>file_put_contents()</code></h2>

  <?php
    
    $file = 'text.txt';

    if( file_put_contents( $file, "Irgendwelche Daten \r\n") ) {
      echo '<p>Schreiben erfolgreich</p>';
    } else {
      echo '<p>Schreiben nicht erfolgreich</p>';
    }

    if( file_put_contents( $file, "Noch mehr Daten \r\n", FILE_APPEND) ) {
      echo '<p>Schreiben erfolgreich</p>';
    } else {
      echo '<p>Schreiben nicht erfolgreich</p>';
    }

    if( file_put_contents( $file, "Weitere Daten \r\n", FILE_APPEND) ) {
      echo '<p>Schreiben erfolgreich</p>';
    } else {
      echo '<p>Schreiben nicht erfolgreich</p>';
    }
    
  ?>
</body>

</html>