<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zugriff und Anzeigen</title>
</head>
<body>
  <h1>Zugriff auf das DBMS und Anzeigen von Daten</h1>
  <?php
    
  /* Test, welche DB-Treiber aktiviert sind
  Dies ist nur EINMAL erforderlich und kann danach gelöscht werden */
  echo '<pre>', print_r( PDO::getAvailableDrivers(), true ), '</pre>';

  // Verbindung zum DB-Server aufnehmen
  

  // Alle Datensätze der Tabelle tbl_personen anzeigen
  // Die Abfrage wird vorbereitet und ausgeführt und die Antwort des Servers in ein Statement-Objekt gespeichert


  // Verbindung zum DBMS schließen
  
    
  ?>
</body>
</html>