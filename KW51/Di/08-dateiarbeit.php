<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dateiarbeit</title>
</head>

<body>
  <h1>Dateiarbeit</h1>

  <?php
#region docs
    /*
    Die Modi und ihre Bedeutung

    r   read    nur zum lesen öffnen
    r+  read+   zum Lesen und Schreiben öffnen
                der Dateizeiger wird an den Anfang der Datei gesetzt
    w   write   nur zum Schreiben
                Dateizeiger am Anfang und die Länge der Datei wird auf 0 Byte gesetzt (evtl. vorhandene Daten werden gelöscht)
                Existiert die Datei nicht, wird sie angelegt
    w+  write+  wie w, aber zum Lesen und Schreiben geöffnet

    a   append  zum Schreiben öffnen
                Dateizeiger am Ende
                Daten werden angehängt
    a+  append+ wie a, aber zum Lesen und Schreiben geöffnet

    x           Erzeugt und öffnet eine Datei zum Schreiben
                Dateizeiger am Anfang
                Existiert die Datei bereits liefert fopen() FALSE
    x+          wie x aber Lesen und Schreiben

    c           wie w, aber die Datei wird nicht überschrieben
                Dateizeiger am Anfang (Daten werden am Anfang der Datei hinzugefügt)
    c+          wie c, aber Lesen und Schreiben
    */
#endregion
    
    $file = '08-user.txt';

    // 1. Prüfe, ob die Datei existiert und ob es sich auch um eine Datei handelt
    if( file_exists($file) && is_file($file) ) {

      // 2. Datei öffnen
      $fh = fopen($file, 'r');      // Datei nur zum lesen öffnen

      // 3. Schleife über alle Zeilen der Datei
      while( ! feof($fh) ) {
        // 4. Zeilenweise lesen
        $row = fgets( $fh );
        echo "$row<br>";
      }

      // 5. Datei schließen
      fclose( $fh );
    }

  ?>

  <h2>Die Funktionen <code>readfile()</code> und <code>file()</code></h2>

  <?php
    
    /*
    * readfile()
    liest eine Datei komplett und gibt sie ohne weitere Bearbeitungsmöglichkeit direkt im Browser aus 
    */
    readfile($file);

    /*
    * file()
    liest ebenfalls eine komplette Datei, gibt aber ein Array zurück in welchem jedes Array-Element eine Zeile der Datei darstellt. 
    */
    $filecontent = file($file);
    $i = 1;
    echo '<p>';
    foreach ( $filecontent as $row ) {
      echo 'Zeile ' . $i++ . ': ' . $row . '<br>';
    }
    echo '</p>';
  ?>

  <h2>Lesen mit <code>file_get_contents()</code></h2>

  <?php
    
    /*
    * nl2br()
    wandelt New Line Steuerzeichen in HTML <br> um
    false gibt an, dass kein XHTML-konformes Tag ausgegeben werden soll
    */
    $content = nl2br( file_get_contents( $file ), false );
    echo "<p>$content</p>";
    
  ?>
</body>

</html>