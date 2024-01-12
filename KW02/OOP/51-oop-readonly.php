<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP schreibgeschützte Eigenschaften</title>
</head>

<body>
  <h1>OOP schreibgeschützte Eigenschaften</h1>
  <?php

  // Definition der Klasse Raumschiff
  class Raumschiff
  {
    /** 
     * magische Methode mit schreibgeschützter Eigenschaft 
     * Seit PHP 8.1
     * schreibgeschützte Eigenschaften müssen mit Typhinweisen versehen werden (declare-Anweisung in Zeile 1 nicht vergessen!)
     * */
    function __construct(private readonly int $nummer, private string $bezeichnung, private string $modell, private int $entfernung = 0)
    {
    }

    function entfernen($lichtjahre)
    {
      // $this->nummer = 42;
      $this->entfernung += $lichtjahre;
    }

    function __toString()
    {
      return "($this->nummer), $this->bezeichnung => Erdentfernung: $this->entfernung Lichtjahre<br>";
    }
  }

  $enterprise = new Raumschiff(1, 'U.S.S. enterprise', 'NCC-1701');
  $voyager = new Raumschiff(2, 'U.S.S. Voyager', 'NCC-74656');
  echo $enterprise;
  echo $voyager;
  $enterprise->entfernen(50);
  echo $enterprise;


  ?>
</body>

</html>