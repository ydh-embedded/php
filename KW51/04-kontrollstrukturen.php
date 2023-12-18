<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrollstrukturen</title>
</head>

<body>
    <h1>Kontrollstrukturen</h1>

    <?php

    /* 
        Vergleichsoperatoren

        == ist gleich,
        != <> ist ungleich
        < kleiner als
        > größer als
        <= kleiner gleich
        >= größer

        === ist identisch
        !== ist nicht identisch
        hier wird nicht nur der Wert verglichen, sondern auch der Datentyp
        */

    $a = 5;
    $b = '5';

    echo '<p>$a ist gleich $b ? (==):<br>';
    if ($a == $b) {
        echo 'true';
    } else {
        echo 'false';
    }
    echo '</p>';

    echo '<p>$a ist identisch $b ? (===):<br>';
    if ($a === $b) {
        echo 'true';
    } else {
        echo 'false';
    }
    echo '</p>';


    $c = true;
    $d = 1;

    echo '<p>$c ist gleich $d ? (==):<br>';
    if ($c == $d) {
        echo 'true';
    } else {
        echo 'false';
    }
    echo '</p>';

    echo '<p>$c ist identisch $d ? (===):<br>';
    if ($c === $d) {
        echo 'true';
    } else {
        echo 'false';
    }
    echo '</p>';

    /* 
        Spaceship-Operator <=>
        Null coalescing ??
        */

    ?>

    <h2>Der Spaceship-Operator <code>
            <=>
        </code></h2>

    <?php

    $i = 6;
    $k = '6';

    /* Der Spaceship Operator ergibt:
         1: Wenn der linke Wert größer als der rechte Wert ist
        -1: Wenn der linke Wert kleiner als der rechte Wert ist
         0: Wenn beide Werte gleich sind
        Es wird auf Gleichheit der Werte und nicht der Datentypen geprüft 
        */
    $l = $i <=> $k;

    echo "<p>$i <=> $k ergibt $l</p>";

    ?>

    <h2>Der Null coalescing Operator <code>??</code></h2>

    <?php

    $x = 5;
    # $y = 0;

    /* 
        Der Null coalescing Operator prüft, ob die linke Variable (hier $y) existiert.

        Existiert sie, wird der Wert der linken Variable der Ergebnisvariable (hier $z) zugewiesen.

        Existiert sie nicht, wird der Wert der rechten Variable (hier $x) der Ergebnisvariable zugewiesen.
        */

    $z = $y ?? $x;

    echo '<p>$z = $y ?? $x ergibt: ' . $z . '</p>';

    ?>

    <h2>if und else</h2>

    <?php

    $wochentag = 'Samstag';
    if ($wochentag == 'Samstag') {
        echo '<p>Wochenende beginnt.</p>';
    } else {
        echo '<p>Wochenende endet bald oder es ist gar kein Wochenende.</p>';
    }

    if ($wochentag == 'Samstag') {
        echo '<p>Wochenende beginnt.</p>';
    } elseif ($wochentag == 'Sonntag') {
        echo '<p>Wochenede endet bald</p>';
    } else {
        echo '<p>leider kein Wochenende.</p>';
    }

    /* Ternär-Operator */

    $s = 0; // mögliche Werte: 1 / 0
    echo '<p>Das Licht ist ' . ($s === 1 ? 'AN' : 'AUS') . '!</p>';


    /* Logische Operatoren zur Prüfung mehrerer Bedingungen:
        
        AND bzw. &&
        Logisches UND: alle Bedingungen müssen TRUE ergeben damit das Prüfungsergebnis TRUE liefert

        OR bzw. ||
        Logisches ODER: ist eine der Bedingungen TRUE ergibt das Prüfungsergebnis TRUE

        XOR
        Logisches ENTWEDER ODER: Entweder die eine oder die andere Bedingung ist TRUE, damit das Prüfungsergebnis TRUE ergibt. Sind beide TRUE ergibt das Prüfungsergebnis FALSE

        !
        Logisches NICHT: Umkehrung des Wahrheitswertes
        */

    ?>

    <h2>Switch</h2>

    <?php
        
        $tag = 'Sonntag';

        switch ($tag) {
            case 'Samstag':
                echo '<p>Wochenende (Sa).</p>';
                break;
            case 'Sonntag':
                echo '<p>Wochenende (So).</p>';
                break;
            default:
                echo '<p>Leider kein Wochenende.</p>';
        }

        $gewicht = 46;
        echo "<p>Das Gepäck wiegt $gewicht kg. Es gehört zur Kategorie ";

        switch (true) {
            case ($gewicht <= 20):
                echo 'S (bis 20 kg)';
                break;
            case ($gewicht <= 40):
                echo 'M (bis 40 kg)';
                break;
            default:
                echo 'L (über 40 kg)';
        }

        echo '.</p>';


        $note = 3;

        switch ($note) {
            case 1: case 2: case 3: case 4:
                echo '<p>Test bestanden.</p>';
                break;
            case 5:
            case 6:
                echo '<p>Test nicht bestanden.</p>';
                break;
            case 'nicht bewertet':
                echo '<p>Test wurde abgebrochen und nicht bewertet.</p>';
                break;
            default:
                echo '<p>Ich kann keine Note zwischen 1 und 6 erkennen.</p>';
        }
        
    ?>

    <h2>Match</h2>

    <?php
        
        $farbe = 'rot';

        $ergebnis = match ($farbe) {
            'gruen', 'blau' => '0 gewinnt',
            'rot'           => 'Rote Zahlen gewinnen.',
            'schwarz'       => 'Schwarze Zahlen gewinnen',
            default         => 'kein korrekter Wert'
        };

        echo "<p>Die Farbe ist $farbe.</p>";
        echo "<p><code>match()</code> gab zurück: $ergebnis</p>";
        
    ?>

</body>

</html>