<?php require_once 'includes/pdo-connect.inc.php'; ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ausgabe Person</title>
</head>

<body>
  <?php

  /* Prepared Statements
  DB-Abfrage mit Platzhalter(n) (? / :benannt) */
  $sql = "SELECT * FROM `tbl_personen`";

  try {
    // Die Abfrage wird vorbereitet und die Antwort des Servers in ein Statement-Objekt gespeichert
    // Da die Abfrage einen Platzhalter enthält muss PDO::prepare() verwendet werden
    
  } catch (PDOException $e) {
    echo 'ERROR:<br>' . $e->getMessage();
  }

  ?>
</body>

</html>