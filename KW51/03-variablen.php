<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variablen in PHP</title>
</head>

<body>
  <h1>Variablen in PHP</h1>

  <?php

  /* Bekanntgabe (Deklaration) und Wertzuweisung (Initialisierung) einer Variable */
  $test = 5;

  echo '<p>' . gettype($test) . '</p>';

  $test = 'Test';

  echo '<p>' . gettype($test) . '</p>';

  /* Numerische Datentypen */
  $preis = 2.59; // float / double
  $menge = 4;    // integer

  $erg = $menge * $preis; // wir zu float

  echo "<p>Rechnungsbetrag: $erg €</p>";

  /* Arithmetische Operatoren
         +  Addition
         -  Subtraktion
         *  Multiplikation
         /  Division 
         ** Potenz
         % Modulo
        */

  /* 
  ! Inkremente (++)
  1. Präinkrement
  ++$a erhöht die Variable $a um 1 VOR der weiteren Verwendung
  */

  $a = 10;
  $b = 2;
  $c = ++$a + $b;
  /**
   * In Zeile 49:
   * 1. $a wird um 1 erhöht (10 + 1 = 11)
   * 2. dieser Wert von $a (11) wird der Variablen $b zugewiesen
   */

  echo "<p>Das Ergebnis ist: $c. (a = $a)</p>";

  /* 2. Postinkrement
  $a++ erhöht die Variable $a NACH der weiteren Verwendung */

  $a = 10;
  $b = 2;
  $c = $a++ + $b;
  /**
   * In Zeile 63:
   * 1. aktueller Wert von $a (10) wird der Variablen $b zugewiesen
   * 2. $a wird um 1 erhöht (10 + 1 = 11)
   */

  echo "<p>Das Ergebnis ist: $c. (a = $a)</p>";

  /* 
        ! Dekremente (--)         
        wie Inkremente nur mit Subtraktion */


  /* 
        ? Zuweisungs-Operatoren (+=  -=  *=  /=) 
        */

  $a = 10;
  $b = 2;

  $a += $b; // Alternative für $a = $a + $b


  /* Zeichenketten-Operatoren 
            .   Konkatenation (Verkettung von Zeichenketten)
            .=  Anhängen einer Zeichenkette an eine bereits vorhandene Zeichenkette
        */

  $a = '<p>Erfurt ist ';
  $a = '<p>Jena ist '; // $a wird überschrieben
  $b = 'eine schöne';
  $c = $a . $b . ' Stadt.</p>';
  echo $c;

  $a =  '<p>Erfurt ist ';
  $a .= 'aber viel ';
  $a .= 'schöner.</p>';
  echo $a;

  /* 
        ! Zeichenketten und numerische Datentypen
        */

  /* 
        ! Diese Funktionalität wird nicht empfohlen!!! 
        */
  $preis_ziege = '0.5 Kamele';
  $menge = 5 * 2;

  echo "<p>Eine Ziege kostet $preis_ziege.</p>";
  echo "<p>$menge Ziegen kosten " . ($preis_ziege * $menge) . " Kamele.</p>";

  /* Konstanten */

  /* klassische Variante */
  define('SEK_TAG', 24 * 60 * 60);
  #define('SEK_TAG', 6500);

  /* neuere Variante seit PHP 5.5, funktioniert nur im Top-Level-Scope */
  const MIN_TAG = 24 * 60;

  echo '<p>Ein Tag hat ' . MIN_TAG . ' Minuten bzw. ' . SEK_TAG . ' Sekunden.</p>';

  ?>
</body>

</html>