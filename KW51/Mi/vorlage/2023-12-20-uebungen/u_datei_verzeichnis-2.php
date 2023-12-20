<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datei / Verzeichnis</title>
</head>

<body>
  <?php
  $verzeichnis = ".";
  $feld_namen = array();
  $feld_endung = array( "html" => 1, "php" => 2, "txt" => 3, "css" => 4 );

  $handle = opendir($verzeichnis);
  while ($oName = readdir($handle))
    if (is_file($oName)) {
      // Trenne den Dateinamen am Punkt in 2 Teile und speichere diese in ein Array
      $feld_teile = mb_split("\.", $oName);
      // extrahiere die Dateiendung
      $endung = $feld_teile[count($feld_teile) - 1];
      // Prüfe, ob die extrahierte Dateiendung als Schlüssel im Array $feld_endung exitiert...
      if (array_key_exists($endung, $feld_endung)){
        // ... und hänge dann den Dateinamen an das Array $feldNamen an
        array_push($feld_namen, $oName);
      }
    }
  closedir($handle);

  // Sortiere das Array $feldNamen alphabetisch...
  sort($feld_namen, SORT_STRING);
  // und gib es in einer Schleife aus
  for ($i = 0; $i < count($feld_namen); $i++)
    echo "<a href='$feld_namen[$i]'>$feld_namen[$i]</a><br>";
  ?>
</body>

</html>