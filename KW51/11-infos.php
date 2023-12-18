<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datei- und Verzeichnis-Infos</title>
</head>
<body>
  <h1>Datei- und Verzeichnis-Infos</h1>

  <?php
    
  $file = 'benutzer.csv';
  $info = stat($file);
  


  /* 
   * Magische Konstante  
   Der Name des Verzeichnisses, in dem sich die Datei befindet.
   siehe: https://www.php.net/manual/de/language.constants.magic.php
   */
  $verzeichnis = __DIR__;
    
  ?>
  <h2>Infos über das Verzeichnis <?= $verzeichnis; ?></h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Datei /<br>Verzeichnis</th>
      <th>readable /<br>writable</th>
      <th>Dateigröße</th>
      <th>Letzte<br>Änderung</th>
    </tr>
    <?php
      
    // 1. Öffne das Verzeichnis
    $dh = opendir($verzeichnis);

    // 2. Alle Objektnamen lesen
    while( $oName = readdir($dh) ) {
      echo '<tr>';

        // 3. Name der Datei oder des Verzeichnisses ausgeben
        echo "<td>$oName</td>";

        // 4. Datei oder Verzeichnis
        echo '<td>';

          if( is_file($oName) ) {
            echo 'D';
          } else if( is_dir($oName) ){
            echo 'V';
          } else {
            echo '&nbsp;';
          }

        echo '</td>';

        // 5. Lesbar bzw. schreibbar?
        echo '<td>';

          if( is_readable($oName) ) {
            echo 'R';
          } else {
            echo '-';
          }

          if( is_writable($oName) ) {
            echo 'W';
          } else {
            echo '-';
          }

        echo '</td>';

        // 6. Größe (bei Dateien)
        echo '<td>';
          $info = stat($oName);
          if( is_file($oName) ) {
            echo $info['size'] . ' B';
          } else {
            echo '&nbsp;';
          }
        echo '</td>';

        // 7. Letzte Änderung
        echo '<td>';
          
          echo date('d.m.Y H:i:s', $info['mtime']);

        echo '</td>';

      echo '</tr>';
    }

    // 8. Verzeichnis schließen
    closedir($dh);
      
    ?>
  </table>
</body>
</html>