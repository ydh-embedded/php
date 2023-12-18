<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session-Daten und Session löschen</title>
</head>
<body>
  <h1>Session-Daten und Session löschen</h1>
  <?php
    
    echo '<pre>', print_r( $_SESSION, true ), '</pre>';

    /* Einzelne Werte aus der Session löschen */
    

    echo '<pre>', print_r( $_SESSION, true ), '</pre>';

    /* Um die Session zu löschen wird sicherheitshalber zunächst das Array geleert*/
    

    echo '<pre>', print_r( $_SESSION, true ), '</pre>';

    echo '<p>Die Session mit der ID ' . session_id() . ' wurde ';

    

    echo '</p>';
    
  ?>
</body>
</html>