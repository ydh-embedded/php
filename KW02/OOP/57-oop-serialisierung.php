<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Serialisierung</title>
</head>
<body>
  <h1>OOP Serialisierung: Objekte speichern</h1>
  <?php
    
  include '57-oop-serialisierung.inc.php' ;
  $enterprise = new Raumschiff('U.S.S. Enterprise', 'NCC 1701', 25);

  // Objekt wird serialisiert
  $s = serialize($enterprise);

  // Objekt wird gespeichert
  file_put_contents('57-oop-serialisierung.dat', $s);

  echo '<p>Objekt serialisiert und in Datei gespeichert.</p>';
    
  ?>
</body>
</html>