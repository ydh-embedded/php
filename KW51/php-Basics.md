## php  Aufbau

Eine php datei gibt an den Browser eine statische html datei

Plug-In Installieren php-elephant

Code Snipped installieren

dafür laden wir die Datei runter etwa 10 KB und legen diese in folgenden <a href="C:\Users\admin\AppData\Roaming\Code\User\snippets">Pfad</a></a> ab:

    C:\Users\admin\AppData\Roaming\Code\User\snippets


## Links

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
