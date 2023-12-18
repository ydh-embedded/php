<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auslesen der Session-Daten</title>
</head>
<body>
  <h1>Auslesen der Session-Daten</h1>
  <p><em>Folgende Daten wurden gespeichert:</em></p>

  <p>
  <?php
    
    foreach ($_SESSION as $key => $value) {
      echo "$key: $value<br>";
    }
    
  ?>
  </p>

  <p>Weiter zur <a href="30-session-destroy.php">folgenden Seite</a>.</p>
</body>
</html>