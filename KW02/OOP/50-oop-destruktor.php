<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Destruktor</title>
</head>

<body>
  <h1>OOP Destruktor</h1>
  <?php

  // Definition der Klasse Raumschiff
  class Raumschiff
  {
    // magische Methode
    function __construct(private $bezeichnung, private $modell, private $entfernung = 0)
    {
    }

    // eigene Methode
    function entfernen($lichtjahre)
    {
      $this->entfernung += $lichtjahre;
    }

    // magische Methoden
    function __toString()
    {
      return "$this->bezeichnung => Erdentfernung: $this->entfernung Lichtjahre<br>";
    }

    function __destruct()
    {
      echo 'Destruktor<br>';
    }
  }

  $enterprise = new Raumschiff('U.S.S. enterprise', 'NCC-1701');
  echo $enterprise;
  $enterprise->entfernen(50);
  echo $enterprise;


  ?>
</body>

</html>