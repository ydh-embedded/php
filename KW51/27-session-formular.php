<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular zur Eingabe von Daten</title>
</head>
<body>
  <h1>Session: Angaben zur Person</h1>
  <p>Bitte füllen Sie die nachfogenden Eingabefelder aus:</p>

  <form action="28-session-auswertung.php" method="post">
    <p>Vorname: <input type="text" name="vorname"></p>
    <p>Nachname: <input type="text" name="nachname"></p>
    <p>Wohnort: <input type="text" name="ort"></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>