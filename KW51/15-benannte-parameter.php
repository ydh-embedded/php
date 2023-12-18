<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benannte Parameter</title>
</head>
<body>
  <h1>benannte Parameter</h1>
  <?php
    
  function zeigeDaten( $nachname, $vorname, $alter ) {
    return "$vorname $nachname ist $alter Jahre alt.";
  }

  // Mit benannten Parametern ist es möglich die Reihenfolge der Parameter zu ändern ...

  echo '<p>' . zeigeDaten( alter: 27, vorname: 'Paula', nachname: 'Lehmann' ) . '</p>';

  function berechne($anzahl, $preis = 42, $waehrung = '€') {
    $erg = $anzahl * $preis;
    $ausgabe = "Ihr Einkauf kostet $erg $waehrung";
    return $ausgabe;
  }

  // ... oder optionale Parameter zu überspringen.
  echo '<p>' . berechne(3, 42, '$') . '</p>';
    
  ?>
</body>
</html>