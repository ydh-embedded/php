<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>anonyme Funktionen</title>
</head>
<body>
  <h1>anonyme Funktionen</h1>
  <h2>Definition ohne Funktionsname</h2>
  <?php
    
  $hallo = function ($n) {
    return "Hallo $n!";
  };

  echo '<p>' . $hallo('Torsten') . '</p>';

  $gruss = $hallo;

  echo '<p>' . $gruss('Sandra') . '</p>';

  ?>

  <h2>Pfeilfunktion</h2>
  <?php

  $summe = fn($a, $b) => $a + $b;

  echo "<p>Addition: " . $summe(37,5) . '</p>';
    
  ?>
</body>
</html>