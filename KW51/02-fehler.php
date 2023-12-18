<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehler in PHP</title>
</head>
<body>
    <h1>Fehler in PHP</h1>

    <?php

        /* Fehlerausgaben administrieren (hier: alle Meldungen einschalten) */
        
        
        /**
         * Fehler-Kategorien
         * 
         * ! Fehler (Error, Parse Error, Fatal Error)
         * Schwerwiegende Fehler
         * Brechen das Skript an der Stelle ab, wo er aufgetreten ist oder führen es erst gar nicht aus.
         *
         */
        prin_r($i);
        echo "<p>String mit "falschen" Zeichen.</p>";

        /**
         * ! Warnung 
         * Wichtig - möglichst bald beheben.
         * Skripte werden trotzdem bis zum Ende ausgeführt. 
         * */

        echo '<p>Der Wert der Variable $i ist: ' . $i . '</p>';


        echo '<p>Ende aller Fehler.</p>';
    ?>
</body>
</html>