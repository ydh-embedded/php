<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>optionale Parameter</title>
</head>
<body>
  <h1>Funktionen mit optionalen Parametern</h1>
  <?php
    
    function berechne($anzahl, $preis, $waehrung) {
      $erg = $anzahl * $preis;
      $ausgabe = "Ihr Einkauf kostet $erg $waehrung";
      return $ausgabe;
    }

    $erg = berechne(5, 3.56, '$');
    echo "<p>$erg</p>";
    
  ?>
</body>
</html>