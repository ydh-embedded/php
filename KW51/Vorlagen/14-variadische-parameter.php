<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>variable und variadische Parameter</title>
</head>
<body>
  <h1>variable und variadische Parameter</h1>

  <h2>variable Parameter</h2>
  <?php 
  
  function ausgabe( $name, $alter ) {
    // hier die Anweisungen eintragen
  }

  // normaler Aufruf
  echo '<p>' . ausgabe('Martin', 23, 'männlich', 'Motorrad', 4, false) . '</p>';
  
  ?>

  <h2>variadische Parameter</h2>

  <?php
  
  /* 
    variadische Parameter nutzen ein Array als Parameter-Definition
    Dazu muss der Name mit vorangestellten ... als Parameter übergeben werden
  */

  function zeige_zutaten( ...$args ) {
    $ausg = '<ul>';
    foreach ($args as $arg) {
      $ausg .= "<li>$arg</li>";
    }
    $ausg .= '</ul>';
    return $ausg;
  }

  echo zeige_zutaten( 'Butter', 'Mehl', 'Eier' );
    
  ?>

  <h2>Übergabe einer Parameter-Liste</h2>

  <?php
  
  
  function personInfo( $name, $vorname, $alter ) {
    return "$vorname, $name ist $alter Jahre alt.";
  }

  echo '<p>' . personInfo( 'Winter', 'Maria', 38 ) . '</p>';
  
  // häufig werden bei dynamischen Abfragen z.B. einer Datenbank Arrays geliefert
  
    
  ?>
</body>
</html>