# php

## php  Aufbau

Eine php datei gibt an den Browser eine statische html datei

Plug-In Installieren php-elephant

Code Snipped installieren

dafür laden wir die Datei runter etwa 10 KB und legen diese in folgenden <a href="C:\Users\admin\AppData\Roaming\Code\User\snippets">Pfad</a></a> ab:

    C:\Users\admin\AppData\Roaming\Code\User\snippets

## Links

.
<a href="[C:\Users\admin\AppData\Roaming\Code\User\snippets](https://kurse.jaderbass.de/?page=php)">Pfad Jaderbass Website</a></a>

## etwas Code

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hallo PHP </title>
    </head>
    <body>


        <!-- PHP - Bereich öffnen -->

        <?php

        /* Mehrzeiliger Kommentar */

        // einzeriliger Kommentar

        # alternativer Kommentar

    /*
            Die Anweisung echo ist ein Sprach-Konstrukt
            es kann Zeichenketten in das temporäre html Dokument
            
    */

        echo' <p> Hallo, mein Erster Absatz über PHP. </p>';

    /*
        mögliche Syntax für das echo
        Strings ( Zeichenketten )können entweder als mehrere Argumente oder miteinander     verunden als einzelnes Argument übergeben werde

    */

    ?>

    </body>
    </html>

.

## Verkettungs-Opperator

    echo 'Dieser' , 'String' , 'besteht' , 'aus' , 'mehreren Argumenten/Parameter', "\n";

.

    echo 'Dieser' . 'String' . 'wurde' . 'mit' , 'Der String-Verkettung erzeugt', "\n";
.

Kurzform

    <?= '<h2>Direkte Ausgabe</h2>' ; ?>

.

## Variablen in php

Variablen werden mit dem Dollar Zeichen begonnen (interne Kennzeichnung einer Variable)

    $eine_variable = 'Ich bin eine Variable.' ;

## Convention

Variablen fangen immer mit KleinBuchstaben an keine Zahl

## echo Konkatinator Opperator der Punkt im ' '

    echo '<p>Der Inhalt meiner Variable ist: ' . $eine_variable . '</p>' ;

## Kurzschreibweise in ""

    echo "<p>Der Inhalt meiner Variable ist: $eine_variable</p>" ;

## php Interpreter

werden im Code die "" verwendet so werden die Argumente immer durch den Interpreter geschickt. Es wird empfohlen, wenn keine variablen vorhanden sind die "" mit den einfachen '' zu ersetzen (Performance Gründe)

## Error

ein Error wird mit einer weisen Seite angezeigt
um die Fehlermeldung anzuzeigen muss die Zeile error_reporting auf (E_ALL) setzen !

    <?php
            error_reporting (E_ALL);
    ?>

## Warning

warnung vom php Interpreter beheben
<a href="www.php.net" >php Website</a>

## php.ini wenn man den Zugriff auf dem WEb-Server hat

wir schalten die Fehler-Meldung hiermit aus:

    display_errors
        Default Value: On
        Developement: On

    display_errors=Off

## ini_set

wir schalten die Fehler-Meldung hiermit aus:

    ini_set('display_errors' , 'On') ;

## Datentyp "Typlose Variable"

in php werden Variablen deklariert können aber im Quelltext unterschiedliche Typen erfahren
Initialisiert zur Entwicklung einen String (Platzhalter) und später mit einer Ganzzahl(nummerische Zahl)

## Wir rechnen mit der dynamischen Typ-Convertierung

    $preis = 2.59   ;
    $menge = 4      ;

    $ergebnis = $menge * $preis ; //hier wird ein float erwirkt durch den double Wert
    $ergebnis = 10,36 ;
.

## Wir erstellen eine Zeichenkette mit einer Variable

    $a = ' <p> Erfurt ist ';
    $a = ' <p> Jena ist   '; // $a wird überschrieben
    $b = ' eine schöne';

    $c =  $a . $b . ' Stadt.</p>';
            echo $c ;

    $a =  '<p>Erfurt ist ';
    $a .= 'aber viel ';
    $a .= 'schöner.</p>';
            echo $a ;

## Wir verwenden in php sehr gerne Klammern ()

    $preis_ziege = '0.5 Kamele';        //sollte die Zeichenkette mit einer Nummerischen Zahl beginnen wird ein Float erstellt

    $menge = 5 * 2;

    echo "<p>Eine Ziege kostet $preis_ziege.</p>";

    echo "<p>$menge Ziegen kosten " . ($preis_ziege * $menge) . " Kamele.</p>";

## dirty Coding

//  sollte die Zeichenkette mit einer Nummerischen Zahl beginnen wird ein Float erstellt
//  Gefahr von Typ-Convertierung die nicht einsehbar ist!

    $preis_ziege = '0.5 Kamele';

## Konstanten immer mit ' '

.
**klassische Variante**

        define('SEK_TAG', 24 * 60 * 60);
        #define('SEK_TAG', 86400);

.**neuere Variante** seit PHP 5.5, funktioniert nur im Top-Level-Scope

    const MIN_TAG = 24 * 60;
.

## Trenn-Striche erzeugen

.

***

## Datentyp-Vergleich identischer Opperator

.

    echo '<p>$a ist identisch $b ? (===):<br>'  ;
    if ($a === $b) {
            echo 'true';
    } else {
            echo 'false';
    }

    echo '</p>';
.

## Ternär Operator

.

    $s = 7 ;
    echo '<p>Das Licht ist' . ($s === 1 ? 'AN' : 'AUS' ) . '!</p>'  ;

## Spaceship-Operator

Der Operator wurde mit php7 eingeführt
Er kann den Ersten Wert mit dem Zweiten Wert vergleichen

.

    <?php
        echo "Erster  Wert"   .   ( 12 <=>  5)   .  "<br>"  ;   //Ergebnis:   1
        echo "Zweiter Wert"   .   (  5 <=> 12)   .  "<br>"  ;   //Ergebnis:  -1
        echo "Dritter Wert"   .   (  5 <=>  5)   .  "<br>"  ;   //Ergebnis:   0
    ?>
.

## Switch - Anweisung mit Bedingung im case Teil

        echo "<p> Das Gepäck wiegt $gewicht kg. Es gehört zur Kategorie ";

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

## Match - Anweisung

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

## Schleifen

### HEAD-Controlled

while ( ) { }

    $zahl = 10;

      echo '<p>';
        while ($zahl <= 100) {
            echo "$zahl<br>";
            $zahl += 5;
        }
      echo '</p>';

### Bottom-Controlled

do while ( ) { }

    <?php
    
    echo '<p>';
    
        do {
            echo "$zahl<br>";
            $zahl += 5;
        } while ($zahl <= 100);
    
    echo '</p>';
    
    ?>
.

## Koaleszenz-Operator

Der Koaleszenz-Operator ***??*** wurde mit php7 eingeführt, er verschmilzt die Funktion von:

                            isset ( )
und

                               ? :

isset ist die Existenz-Fuktion und ? : ist der ternäre Operator

## kombinierter Zuweisungs-Operator

Der kombinierte Zuweisungs-Operator verbindet den Koaleszenz-Operator mit einer Zuweisung

                               ??=
.

Der Name Koaleszenz-Operator trägt den Namen in Anlehnung an de Verschmelzung der unterschiedlichen Flüssigkeiten (englisch: ***coalescence***)
