<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular-Auswertung</title>
</head>

<body>
  <h1>Formular-Auswertung</h1>
  <?php



  ?>

  <p>Folgendes haben Sie angegeben:</p>

  <?php
//  Prüfen des Formularsendens
if ( empty( $_POST ) ){
  echo 'Formular enthält keine Werte' ;
} else {
  $anrede   = $_POST['anrede'] ?? NULL ;        //PHP Null Coalescing Operator
  $uname    = $_POST['uname'] ;
  $pw       = $_POST['pw'] ;
  $hidden   = $_POST['hidden']  ;
  $kurs     = $_POST['kurs'] ?? NULL ;            //Array// PHP Null Coalescing Operator
  $dat      = $_POST['dat'] ;
  $status   = $_POST['status'] ;
  $hardware = $_POST['msg'] ;
  $msg      = $_POST['msg'] ;

  if($anrede != NULL){
    echo "Anrede: $anrede" ;
  }

  if(! empty ($uname)){
    echo "Username: $uname" ;
  }

  echo "Versteckt: $hidden" ;

  if(! empty ($pw)){
    echo "Passwort: $pw" ;
  }
  
  if (is_array($kurs)){
    echo 'Kurs:' ;
    echo implode(',' , $Kurs ) ;
  }
  
  if(! empty ($dat)){
    echo "Datum: $dat" ;
  }
  
  if(! $status !='0') {
    echo "Status: $status" ;
  }

  if( ! is_null( $hardware)){
      echo 'Hardware' ;
      echo implode( ',' , $hardware );
  }

  if( ! empty ($msg)){
    echo 'Nachricht:'  . nl2br( $msg , false);
  }
  








}





  ?>
</body>

</html>