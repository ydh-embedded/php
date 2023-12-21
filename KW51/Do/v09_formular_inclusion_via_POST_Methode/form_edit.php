<?php
//  Exist?
    if( file_exists('form_html_to_.php') ) {
        $header = array('Zahl_1', 'Zahl_2', 'Zahl_3');
    } else {
        echo 'Es wurde keine Datenbank gefunden' ;
    }

    $aZahlen     = array( $_POST['Zahl_1'] , $_POST['Zahl_2'] , $_POST['Zahl_3'] );

//  Datei-Header für korrektes UTF8 und erstellen eine Datei Zahlen
//            $fh          =  fopen($Zahlen, 'a');              //apend

    fprintf($fh, chr(0xEF).chr(0xBB).chr(0xBF));

//  wir prüfen ob der Header vorhanden ist
    if(isset($header)) {
        if(! $h = fputcsv($fh, $header, ';')) {
            die('<p>Hilfe! Ein Fehler ist im \$HEADER aufgetreten. Keine Ahnung wie es jetzt weitergehen soll!</p>');
        }
    }
//  wir wenden die Funktion fputcsv an
    if ($f = fputcsv($fh, $aZahlen, ';')) {
        echo "<p>Vielen Dank für Ihre Teilnahme. Ihre Daten wurden gespeichert.</p>";
    } else {
        echo '<p>Fehler beim Speichern der Daten.</p>';
    }

fclose($fh);

var_dump($_REQUEST);


?>