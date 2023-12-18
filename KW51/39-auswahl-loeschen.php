<?php
require_once 'includes/pdo-connect.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datensatz löschen</title>
</head>
<body>
  <h1>Datensatz löschen</h1>
  <?php
    
  if(!empty($_POST)) {
    $sql = 'DELETE FROM `tbl_personen`
    WHERE `perso_nummer` = :pn';
    
    try {
      if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam( ':pn', $_POST['auswahl']);
  
        if( $stmt->execute() ) {
          echo '<p>Es wurden ' . $stmt->rowCount() . ' Datensätze gelöscht.</p>';
        }
      }
    $stmt = NULL;
    $pdo = NULL;
    } catch (PDOException $e) {
      echo 'ERROR:<br>' . $e->getMessage();
    }
  }
    
  ?>
</body>
</html>