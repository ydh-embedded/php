<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parameter-Übergabe per Referenz und rekursive Funktionen</title>
</head>

<body>
  <h1>Parameter-Übergabe per Referenz und rekursive Funktionen</h1>
  <h2>Parameter-Übergabe per Referenz</h2>

  <?php
  // normale Parameter-Übergabe
  function quadrat($value) {
    $ausg = "Das Quadrat von $value ist: ";
    $value = $value * $value;
    $ausg .= $value . "<br>";
    return $ausg;
  }

  // Übergabe der Parameter per Referenz
  function quadrat_referenz($value) {
    $ausg = "Das Quadrat von $value ist: ";
    $value = $value * $value;
    $ausg .= $value . "<br>";
    return $ausg;
  }

  $zahl = 2;
  echo '<p>Ausgangswert von $zahl: <strong>' . $zahl . '</strong></p>';
  echo "<em>call-by-value:</em>";

  echo '<p>';
  for ($i = 1; $i <= 3; $i++) {
    echo quadrat($zahl); // call-by-value
  }
  echo '</p>';


  echo "<p><em>call-by-reference:</em></p>";

  echo '<p>';
  for ($i = 1; $i <= 3; $i++) {
    echo quadrat_referenz($zahl); // call-by-reference
  }
  echo '</p>';
  ?>

  <h2>Rekursive Funktionen</h2>
  <p>... benötigen eine Kontrolle, die die Rekursion bei bestimmten Bedingungen abbricht, da sonst eine Endlosschleife entsteht!</p>

  <?php

  function halbieren(&$z) {
    $z = $z / 2;

    /* Abbruchkontrolle */
    if ($z > 0.1) {
      echo "\$z = $z<br>";
      halbieren($z);
    }
  }

  $x = 1.5;
  echo "<p>\$x = $x</p>";

  echo '<p>' . halbieren($x) . '</p>';

  echo "<p>\$x = $x</p>";

  ?>
</body>

</html>