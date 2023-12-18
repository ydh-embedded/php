<?php
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datensatz ändern</title>
</head>
<body>
  <h1>Datensatz ändern</h1>

  <?php
    
  $error = false;

  // Personalnummer prüfen
  if( int_positiv( 'Personalnummer', $_POST['pn'], $pn ) ) {
    // Prüfung auf doppelten Primary Key bei Änderung
    if( pk_exists( 'Personalnummer', $pn, $_POST['oripn'], $pdo, 'tbl_personen', 'perso_nummer' ) ) {
      $error = true;
    }
  } else {
    $error = true;
  }

  // Gehalt prüfen
  if( !float_positiv( 'Gehalt', $_POST['gh'], $gh ) ) {
    $error = true;
  }

  // Alles richtig: Datensatz ändern
  if( !$error ) {
    if(!empty($_POST)) {
      $sql = 'UPDATE `tbl_personen`
      SET `perso_name` = :na,
      `perso_vorname` = :vn,
      `perso_nummer` = :pn,
      `perso_gehalt` = :gh,
      `perso_geburtstag` = :gt
      WHERE `perso_nummer` = :op';
      
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam( ':na', $_POST['na'] );
          $stmt->bindParam( ':vn', $_POST['vn'] );
          $stmt->bindParam( ':pn', $_POST['pn'] );
          $stmt->bindParam( ':gh', $_POST['gh'] );
          $stmt->bindParam( ':gt', $_POST['gt'] );
          $stmt->bindParam( ':op', $_POST['oripn'] );
    
          if( $stmt->execute() ) {
            echo '<p>Es wurde ' . $stmt->rowCount() . ' Datensatz geändert.</p>';
          }
        }
      $stmt = NULL;
      $pdo = NULL;
      } catch (PDOException $e) {
        echo 'ERROR:<br>' . $e->getMessage();
      }
    }
  }
    
  ?>
</body>
</html>