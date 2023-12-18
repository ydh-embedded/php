<?php
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datensatz anzeigen</title>
</head>
<body>
  <h1>Datensatz</h1>
  <p>Bitte neue Inhalte eintragen und speichern:</p>

  <form action="38-auswahl-aendern.php" method="post">
    <?php
      
    $sql = 'SELECT * FROM `tbl_personen` WHERE `perso_nummer` = :pnr';
    
    try {
      if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam( ':pnr', $_POST['auswahl'] );
        $stmt->execute();
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          $row = $stmt->fetchObject();
          ?>
          <p><input type="text" name="na" value="<?= $row->perso_name; ?>"> Name</p>
          <p><input type="text" name="vn" value="<?= $row->perso_vorname; ?>"> Vorname</p>
          <p><input type="text" name="pn" value="<?= $row->perso_nummer; ?>"> Personalnummer</p>
          <p><input type="text" name="gh" value="<?= $row->perso_gehalt; ?>"> Gehalt</p>
          <p><input type="date" name="gt" value="<?= $row->perso_geburtstag; ?>"> Geburtstag</p>
          <input type="hidden" name="oripn" value="<?= $_POST['auswahl']; ?>">
          <?php
        }
      }
    $stmt = NULL;
    $pdo = NULL;
    } catch (PDOException $e) {
      echo 'ERROR:<br>' . $e->getMessage();
    }
      
    ?>
    <p><input type="submit" value="Speichern"> <input type="reset"></p>
  </form>
</body>
</html>