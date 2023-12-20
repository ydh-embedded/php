<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular-Auswertung</title>
</head>
<body>
<h1>Formularauswertung</h1>

<?php
#region Eingabe in aufnehmen und in ein Array packen & und in eine Txt Datei posten
    echo '<pre>' , var_dump ( $_POST ) , '</pre>' ;
    
    $vorname        =   $_POST['firstname'] ;
    $nachname       =   $_POST['lastname']  ;
    $email          =   $_POST['email']     ;
    $nachricht      =   $_POST['msg']       ;
    
    echo nl2br("<p> <br> Folgende Werte wurden gespeichert: <br> $vorname $nachname<br> $email<br> $nachricht. </p>  " , false ) ;
    echo nl2br("<p> <br> Folgende Werte wurden gespeichert: <br> $vorname $nachname<br> $email<br> $nachricht. </p>  " , true  ) ;
    
//!  Variable zum Speichern der Daten in eine Textdatei vorbereiten

$benutzer   =   "$vorname $nachname\r \n $email\r \n $nachricht\r \n ------------------------------\r \n " ;
        echo '<pre>' , var_dump ( $benutzer ) , '</pre>' ;

//! mit file_put_contents erzeugen wir eine neue txt Datei aus dem Inhalt des Arrays $benutzer
    file_put_contents('form_10.0_v03_Eingabe_Convert_to_Array.txt' , $benutzer , FILE_APPEND);
#endregion
?>

<h2> Dateien in eine CSV-Datei speichern </h2> ;

<?php
#region Datei in eine CSV-Datei speichern

//!  Tabellen-Zellen in ein Array speichern

    $felder = array( $vorname , $nachname , $email , $nachricht) ;

//!  Dateien erstellen und öffnen und die Handle speichern

    $filehandle = fopen('form_10.0_v03_Eingabe_Convert_to_CSV' , 'a' ) ;

//!  Felder in die CSV-Datei schreiben

    if ( $funktio_csv = fputcsv($filehandle , $felder , ';')) {
        echo "<p> Anzahl $funktio_csv an Feldern werden gespeichert. </p>" ;
    } else {
        echo'<p> Fehler beim speichern der Daten. <br>
                folgende Datei kann nicht beschrieben werden $filehandle
            </p>' ;
    }

#endregion

fclose($filehandle);        //! Das filehandle immer mit fclose schliesen !!
?>

</body>
</html>