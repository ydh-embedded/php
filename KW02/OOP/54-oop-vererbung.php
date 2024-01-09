<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Vererbung</title>
</head>

<body>
  <h1>OOP Vererbung</h1>
  <?php

  class Raumschiff
  {
    function __construct(private $entfernung = 0)
    {
    }

    function entfernen($lichtjahre)
    {
      $this->entfernung += $lichtjahre;
    }

    function __toString()
    {
      return "$this->entfernung Lichtjahre<br>";
    }
  }

  class Raumkreuzer extends Raumschiff
  {
    function __construct(private $entfernung = 0, private $mannschaft = 0)
    {
      // Die Eigenschaft $entfernung des Eltern-Objektes wir übernommen
      parent::__construct($entfernung);
    }

    function erweitern($anzahl) {
      $this->mannschaft += $anzahl;
    }

    function dezimieren($anzahl) {
      $this->mannschaft -= $anzahl;
    }

    function __toString()
    {
      // Die Methode __toString des Elternobjektes wird erweitert
      return "Besatzung: $this->mannschaft Personen, Entfernung: " . parent::__toString();
    }
  }

  
  $deepSpaceNine = new Raumkreuzer();
  echo $deepSpaceNine;
  
  $deepSpaceNine->erweitern(100);
  $deepSpaceNine->entfernen(30);
  echo $deepSpaceNine;

  $deepSpaceNine->entfernen(-30);
  echo $deepSpaceNine;

  $deepSpaceNine->dezimieren(50);
  echo $deepSpaceNine;

  ?>
</body>

</html>