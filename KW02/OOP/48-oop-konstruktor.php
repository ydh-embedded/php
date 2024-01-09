<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Konstruktor</title>
</head>

<body>
  <h1>OOP Konstruktor (klassisch)</h1>
  <?php

  // Definition der Klasse Raumschiff
  class Raumschiff
  {
    public $bezeichnung;
    public $modell;

    // magische Methode
    function __construct($bez, $mod)
    {
      $this->bezeichnung = $bez;
      $this->modell = $mod;
    }
  }

  $enterprise = new Raumschiff('U.S.S. enterprise', 'NCC-1701');

  printf('<p>%s, %s</p>', $enterprise->bezeichnung, $enterprise->modell);

  $voyager = new Raumschiff('U.S.S. Voyager', 'NCC-74656');

  printf('<p>%s, %s</p>', $voyager->bezeichnung, $voyager->modell);
  ?>
</body>

</html>