<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datumsfunktionen</title>
</head>
<body>
  <h1>Datumsfunktionen</h1>
  <h2><code>getdate()</code></h2>
  <?php
    
    echo '<pre>', print_r( getdate() ), '</pre>';
    
  ?>

  <h2><code>date()</code></h2>
  <?php
    
    echo '<p>' . date('d.m.Y H:i:s') . '</p>';
    
  ?>
  <p>Platzhalter siehe <a href="https://www.php.net/manual/de/datetime.format.php" target="_blank">https://www.php.net/manual/de/datetime.format.php</a></p>

  <h2><code>time()</code></h2>
  <?php 
  
    $morgen = time() + 24 * 60 * 60;

    echo '<p>aktueller Zeitstempel: ' . time() . '</p>';

    echo '<p>Morgen ist der ' . date('d.m.Y', $morgen) . '</p>';
  
  ?>

  <h2><code>strftime()</code> (deprecated)</h2>
  <?php
    
    echo '<p>';
    echo  strftime('%A %d %B %Y %H:%M:%S');
    echo '</p>';
    
  ?>

  <h2><code>setlocale()</code></h2>
  <p>funktioniert nur im Zusammenspiel mit <code>strftime()</code></p>
  <?php
    
    setlocale(LC_ALL, 'deu');
    echo '<p>';
    echo  strftime('%A %d %B %Y %H:%M:%S');
    echo '</p>';
  ?>

  
</body>
</html>