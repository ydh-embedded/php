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
    
    echo '<pre>' , var_dump ( $_POST ) , '</pre>' ;
    
    $vorname        =   $_POST['firstname'] ;
    $nachname       =   $_POST['lastname']  ;
    $email          =   $_POST['email']     ;
    $nachricht      =   $_POST['msg']       ;
    
    echo nl2br("<p> <br> Folgende Werte wurden gespeichert: <br> $vorname $nachname <br> $email <br> $nachricht . </p>  " , false ) ;
    echo nl2br("<p> <br> Folgende Werte wurden gespeichert: <br> $vorname $nachname <br> $email <br> $nachricht . </p>  " , true  ) ;
    
    //  Variable zum Speichern der Daten in eine Textdatei vorbereiten
    
    $benutzer   =   "$vorname $nachname \r \n $email \r \n $nachricht \r \n ------------------------------\r \n " ;
    
    echo '<pre>' , var_dump ( $benutzer ) , '</pre>' ;

    file_put_contents('10.0c-benutzer.txt' , $benutzer , FILE_APPEND);

    
    
?>

</body>
</html>