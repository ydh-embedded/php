<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Deserialisierung</title>
</head>

<body>
  <h1>OOP Deserialisierung: Objekte laden</h1>
  <?php

  include '57-oop-serialisierung.inc.php';

  // Prüfe ob Objekt-Backup-Datei existiert
  if(! file_exists('57-oop-serialisierung.dat')) {
    // wenn nicht: Abbruch
    exit('Datei kann nicht gefunden werden');
  }

  // Objekt-Backup einlesen
  $s = file_get_contents('57-oop-serialisierung.dat');

  // Objekt aus Backup-Daten erzeugen
  $enterprise = unserialize($s);
  
  echo '<p>Objekt aus Datei gelesen und deserialisiert.</p>';
  echo $enterprise;

  ?>
</body>

</html>