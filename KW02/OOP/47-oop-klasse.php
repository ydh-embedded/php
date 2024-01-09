<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Klassen</title>
</head>

<body>
  <h1>OOP Klassen</h1>
  <?php

  // Definition der Klasse Raumschiff
  class Raumschiff
  {
    // Eigenschaften
    public $bezeichnung;
    public $modell;
  }

  $enterprise = new Raumschiff();
  $enterprise->bezeichnung = 'U.S.S. enterprise';
  $enterprise->modell = 'NCC-1701';

  printf('<p>%s, %s</p>', $enterprise->bezeichnung, $enterprise->modell);

  $voyager = new Raumschiff();
  $voyager->bezeichnung = 'U.S.S. Voyager';
  $voyager->modell = 'NCC-74656';

  printf('<p>%s, %s</p>', $voyager->bezeichnung, $voyager->modell);
  ?>
</body>

</html>