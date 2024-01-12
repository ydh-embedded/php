<?php

function sql2germanDate($db_datum){          // Wandelt ein SQL-formatiertes Datum in deutsches Datumsformat um

        $feld = mb_split('-', $db_datum);
        $tag = intval($feld[2]);
        $monat = intval($feld[1]);
        $jahr = intval($feld[0]);
        $ausgabe = sprintf("%'.02d.%'.02d.%'.04d", $tag, $monat, $jahr);
return  $ausgabe;                          //  /* Datumsformat aus DB JJJJ-MM-TT */
}

function german2sqlDate($db_datum){          //  Wandelt ein SQL-formatiertes Datum in deutsches Datumsformat um

        $feld = mb_split('\.', $db_datum);
        $tag = intval($feld[0]);
        $monat = intval($feld[1]);
        $jahr = intval($feld[2]);
        $ausgabe = sprintf("%'.04d-%'.02d-%'.02d", $jahr, $monat, $tag);;
return  $ausgabe;                          //  /* deutsches Datum (TT.MM.JJJJ) */
}

