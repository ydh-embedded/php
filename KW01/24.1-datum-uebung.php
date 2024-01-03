<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datumsfunktionen</title>
</head>

<body>
<h2>Aufgabe 1.0<br><code>time()</code></h2>
<p></p>
  <?php
  
    $morgen = time() + 24 * 60 * 60;
    $heute = time() ;

    echo '<p>aktueller Zeitstempel: ' . time() . '</p>';
    echo '<p>Heute ist der ' . date('d.m.Y', $heute) . '</p>';
    echo '<p>Morgen ist der ' . date('d.m.Y', $morgen) . '</p>';
  
  ?>

<h2>Aufgabe 1.1<br><code>date()</code></h2>
<p>
  <?php
  
    $heute = date('d.m.Y');

    echo '<p>aktuelles Datum: ' . date('d.m.Y') . '</p>';
    echo '<p>aktuelles Datum: ' . date('Y.m.d') . '</p>';
    
  ?>

<h2>Aufgabe 1.2<br><code>date('Y-m-d')</code></h2>
<p>
  <?php
  
    $heute = date('d.m.Y');

    echo '<p>aktuelles Datum: ' . date('Y-m-d') . '</p>';
    
  ?>

<h2>Aufgabe 1.3<br><code>date('d.m.Y' . ' - ' . 'H:i:s')</code></h2>
<p>
  <?php
  
    $heute = date('d.m.Y');

    echo '<p>aktuelles Datum: ' . date('d.m.Y' . ' - ' . 'H:i:s') . '</p>';

  ?>

<h2>Aufgabe 1.4<br><code>date('H:i:s' . ' - ' . 'd.m.Y')</code></h2>
<p>
  <?php
    echo '<p>aktuelles Datum: ' . date('H:i:s' . ' - ' . 'd.m.Y') . '</p>';
  ?>

<h2>Aufgabe 1.5<br><code>date('d/m/Y' . ' - ' . 'h:i' )</code></h2>
<p>
  <?php
    $heute = date('d/m/Y' . ' - ' . 'h:i A');
    $Zeitverschiebung = date (' P');
    echo '<p>aktuelles Datum: ' . $heute . $Zeitverschiebung . ' Std.';
  ?>

<h2>Aufgabe 1.6<br><code>$_SERVER['REQUEST_TIME']</code></h2>
<p>
  <?php
    $Server_Zeit = $_SERVER['REQUEST_TIME'] ;
    echo '<p>aktuelle Uhrzeit: ' . $Server_Zeit ;

    
    ?>



<h2>Aufgabe 1.7<br><code>print_r( gettimeofday(true) )</code></h2>
<?php
    
    echo '<pre>', print_r( gettimeofday(false) ), '</pre>';
    
    ?>



<h2>Aufgabe 1.8<br><code>print_r( gettimeofday(true) )</code></h2>
    <?php
      $heute = date('U/h/r H:i A');
      $Zeitverschiebung = date (' P');
      echo '<p>aktuelles Datum: ' . $heute . $Zeitverschiebung . ' Std.';
    ?>

</body>
</html>