<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Methoden</title>
</head>

<body>
  <h1>OOP Methoden</h1>
  <?php

  // Definition der Klasse Raumschiff
  class Raumschiff
  {
    // magische Methode (Constructor Property Promotion - seit PHP 8.0)
    function __construct(private $bezeichnung, private $modell, private $entfernung = 0)
    {
    }

    // eigene Methode
    function entfernen($lichtjahre)
    {
      $this->entfernung += $lichtjahre;
    }

    // magische Methode
    function __toString()
    {
      return "$this->bezeichnung => Erdentfernung: $this->entfernung Lichtjahre<br>";
    }
  }

  $enterprise = new Raumschiff('U.S.S. enterprise', 'NCC-1701');
  $voyager = new Raumschiff('U.S.S. Voyager', 'NCC-74656');

  $enterprise->entfernen(50);
  echo $enterprise;

  $voyager->entfernen(180);
  echo $voyager;

  $enterprise->entfernen(200);
  echo $enterprise;

  $voyager->entfernen(-50);
  echo $voyager;

  $enterprise->entfernen(-100);
  echo $enterprise;

  $voyager->entfernen(40);
  echo $voyager;

  $enterprise->entfernen(-150);
  echo $enterprise;

  $voyager->entfernen(-170);
  echo $voyager;

  ?>
</body>

</html>