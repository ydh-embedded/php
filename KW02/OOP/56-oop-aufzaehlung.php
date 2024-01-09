<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Aufzählungen</title>
</head>

<body>
  <?php

  /** 
   * gesicherte Aufzählung (backed enumeration)
   * Typhinweis darf nur int oder string sein
   * ein vorhandener Wert kann nicht an ein weiteres Element gehängt werden
   * Aufzählungen besitzen grundsätzlich eine schreibgeschützte Eigenschaft name
   * gesicherte Aufzählungen zusätzlich noch die schreibgeschützte Eigenschaft value
  */
  enum Status: string
  {
    case undone = 'offen';
    case send = 'gesendet';
    case done = 'abgeschlossen';
    // folgendes wird nicht funktionieren
    // case success = 'abgeschlossen';
  }

  function getStatus(Status $stat) {
    return "Name: $stat->name, Wert: $stat->value<br>";
  }

  echo getStatus(Status::send);

  /**
   * einfache Aufzählung
   */
  enum Skat
  {
    case Eichel;
    case Gruen;
    case Herz;
    case Schellen;

    function getName()
    {
      return $this->name;
    }
  }

  echo Skat::Herz->getName() . '<br>';

  ?>
</body>

</html>