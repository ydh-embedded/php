<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String-Funktionen</title>
</head>
<body>
  <h1>Zeichenketten-Funktionen</h1>
  <h4>Gegeben sind folgende Variablen:<br>
$string1 = "Beachten Sie das Angebot für die ";<br>
$string2 = "folgende Kalenderwoche: ";<br>
$string3 = " ";<br>
$string4 = "Bananen, 5 Kilo für nur 5.- Euro!";<br>
Geben Sie die Variablen mithilfe der Funktion printf()in einer formatierten Zeichen-
kette aus. <br>
Setzen Sie hierfür die Länge der Variablen $string3, die mit dem festgelegten Zeichen 8
gefüllt wird,<br>
auf 5 Zeichen. Trennen Sie die vier Variablen mit der Zeichenkette - - -
voneinander ab.</h4>

<h3>Eigenschaften, Manipulation, Codes</h3>

  <?php

    /* Die Funktion number_format()
    Synthax: number_format(Zahl, Stellen, 'Nachkomma', 'Tausender') */

    
    $string1 = " Beachten Sie das Angebot für die ";
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> \$string1</p>";
    echo "<p><em>Vorher:</em> $string1</p>";
    echo "<p><em>Nachher:</em></p>";
    echo sprintf($string1);
    
    
    $string2 = " folgende Kalenderwoche: ";
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> \$string2</p>";
    echo "<p><em>Vorher:</em> $string2</p>";
    echo "<p><em>Nachher:</em></p>";
    echo sprintf($string2);
    
    $string3 = "  ";
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> \$string3</p>";
    echo "<p><em>Vorher:</em> $string3</p>";
    echo "<p><em>Nachher:</em></p>";

    mb_ereg_search_init($string3, '^ ');
    if (mb_ereg_search())  echo 'Beginnt mit Einem Leerzeichen<br>'       ;
    else                  echo 'Beginnt nicht mit einem Leerzeichen<br>' ;
    echo mb_eregi_replace('  ', '*****', $string3) . '</p>';
    echo printf($string3);

    
    
    $string4 = " Bananen, 5 Kilo für nur 5.- Euro! ";
    echo '<p><br>'. '</br></p>';
    echo "<p><em>Vorher:</em> \$string4</p>";
    echo "<p><em>Vorher:</em> $string4</p>";
    echo "<p><em>Nachher:</em></p>";
    echo sprintf($string4);
    
    $string_gesamt = array("$string1 ; '---' ; $string2 ; '---' ; $string3 ; '---' ; $string4" );
    echo '<p><br>'. '</br></p>';
    echo var_dump($string_gesamt);

    //?echo '<p>Anzahl Zeichen: ' . mb_strlen($string_gesamt) . '<br>';
    //?echo mb_strtolower($string_gesamt) . '<br>';
    //?echo mb_strtoupper($string_gesamt) . '</p>';

    ?>

