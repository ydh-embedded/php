<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daten ins Session-Array speichern</title>
</head>
<body>
  <h1>Daten in der Session speichern</h1>
  <p>Sie haben folgende Daten eingetragen:
    <br>Vorname: <?= $_POST['vorname']; ?>
    <br>Nachname: <?= $_POST['nachname']; ?>
    <br>Wohnort: <?= $_POST['ort']; ?>
  </p>

  <?php
    
    /* Das superglobale Array $_SESSION wird mit den Werten aus dem Formular und dem aktuellen Zeitstempel gefüllt */
    

    echo '<p>Folgende Daten sind nun in der Session gespeichert:</p>';

    
    
  ?>

  <p>Weiter zur <a href="29-session-auslesen.php">folgenden Seite</a>.</p>
</body>
</html>