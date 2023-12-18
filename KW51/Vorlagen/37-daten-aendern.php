<?php require_once 'includes/pdo-connect.inc.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daten ändern</title>
</head>
<body>
  <h1>Datensätze ändern</h1>
  <?php 
  
  $sql = 'UPDATE `tbl_personen`
  SET `perso_gehalt` = `perso_gehalt` * 1.05';

  if($stmt = $pdo->query($sql)) {
    echo '<p>Es wurden ' . $stmt->rowCount() . ' Datensätze geändert.</p>';
  }
  
  ?>
</body>
</html>