<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Konstanten und statische Eigenschaften / Methoden</title>
</head>

<body>
  <h1>OOP Konstanten und statische Eigenschaften / Methoden</h1>
  <?php

  // Definition der Klasse Math
  class Math
  {
    /** 
     * Konstanten sind *immer* öffentlich
     * sie können keine andere Sichtbarkeit annehmen
     * sie sind unabhängig von einzelnen Objekten
     * sie ist insgesamt nur einmal vorhanden
     * */
    const pi = 3.1415926;

    /** 
     * statische Eigenschaften
     * sind unabhängig von einzelnen Objekten
     * sind insgesamt nur einmal vorhanden
     * sollte unmittelbar zu Beginn initialisiert werden
     * */
    static $anzahl = 0;

    function __construct(private $nr = 0)
    {
      // statische Eigenschaft ändern
      self::$anzahl++;
      $this->nr = self::$anzahl;
    }

    function __toString()
    {
      return "Objekt Nr. $this->nr<br>";
    }

    /** 
     * statische Methoden
     * sind unabhängig von einzelnen Objekten
     * ist methodisch einer Klasse zugeordnet
     * */
    static function quadrat($p)
    {
      return $p * $p;
    }

    static function ausgabe()
    {
      echo '<p>Anzahl: ' . self::$anzahl . '<br>';
      echo 'PI: ' . self::pi . '<br>';
      echo '6<sup>2</sup>: ' . self::quadrat(6) . '</p>';
    }
  }

  // erste Ausgabe
  echo '<p>Anzahl: ' . Math::$anzahl . '<br>';
  echo 'PI: ' . Math::pi . '<br>';
  echo '5<sup>2</sup>: ' . Math::quadrat(5) . '</p>';

  // zweite Ausgabe
  echo '<p>';
  $x = new Math();
  echo $x;
  $y = new Math();
  echo $y;
  $z = new Math();
  echo $z;
  echo '</p>';

  // dritte Ausgabe
  Math::ausgabe();
  ?>
</body>

</html>