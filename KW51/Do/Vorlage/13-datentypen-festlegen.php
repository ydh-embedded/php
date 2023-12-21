<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datentyp-Definition</title>
</head>
<body>
  <h1>Datentyp-Definition in Funktionen verwenden</h1>
  <?php
    
  /* Wichtig: Datentyp-Definitionen müssen aktiviert werden! Siehe Zeile 1 */
  function dividiere($zahl1, $zahl2) {
    echo "<p>Wert von \$zahl1: $zahl1 | " . gettype($zahl1) . "</p>";
    echo "<p>Wert von \$zahl2: $zahl2 | " . gettype($zahl2) . "</p>";

    $erg = $zahl1 / $zahl2;

    echo "<p>Wert von\$erg: $erg.</p>";

    return $erg;
  }

  $rueckgabe = dividiere(10, 15);

  echo "<p>Wert von \$rueckgabe: $rueckgabe</p>";
  echo "<p>Datentyp von \$rueckgabe: " . gettype($rueckgabe) . '.</p>';
    
  ?>
</body>
</html>