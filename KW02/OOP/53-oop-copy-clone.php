<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Kopieren und Klonen</title>
</head>

<body>
  <h1>OOP Kopieren und Klonen</h1>
  <?php

  class Raumschiff
  {
    function __construct(private $bezeichnung = 'unbekannt', private $modell = 'unbekannt', private $entfernung = 0, private $beschreibung = '')
    {
    }

    function entfernen($lichtjahre)
    {
      $this->entfernung += $lichtjahre;
    }

    function setBez($bez) {
      $this->bezeichnung = $bez;
    }

    function setMod($mod) {
      $this->modell = $mod;
    }

    function __toString()
    {
      return "$this->bezeichnung ($this->modell) => Erdentfernung: $this->entfernung Lichtjahre<br>";
    }

    // magische Methode zum Klonen
    function __clone()
    {
      $this->beschreibung = 'Klon von: ' . $this->bezeichnung;
      $this->entfernung = $this->entfernung + 1;
    }

    static function kopieVon($ori, $bez, $mod)
    {
      $neu = new Raumschiff($bez, $mod);
      $neu->beschreibung = 'Kopie von ' . $ori->bezeichnung;
      $neu->entfernung = $ori->entfernung + 1;
      return $neu;
    }
  }

  // Originalobjekt
  $enterprise = new Raumschiff('U.S.S. Enterprise', 'NCC-1701', 25);

  // zweite Referenz auf Originalobjekt
  $enterpriseA = $enterprise;

  // Klonen eines Objektes
  $voyager = clone $enterprise;
  $voyager->setBez('U.S.S. Voyager');
  $voyager->setMod('NCC-74656');

  /**
   * Übergabe von Objekt an Methode
   * Rückgabe von Objekt aus Methode
   * */
  $discovery = Raumschiff::kopieVon($enterprise, 'U.S.S. Discovery', 'NCC-1031');

  // Auswirkung auf zweite Referenz
  $enterprise->entfernen(50);
  echo 'Enterprise: ' . $enterprise;
  echo 'Enterprise A: ' . $enterpriseA;

  // Ausgabe des Klons
  echo $voyager;

  // Änderung und Ausgabe der Kopie
  $discovery->entfernen(30);
  echo $discovery;

  ?>
</body>

</html>