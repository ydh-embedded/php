<?php 
define( 'DB_NAME', 'shop' );
require_once 'includes/pdo-connect.inc.php'; 
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaffe & mehr</title>
</head>
<body>
  <h1>Der Kaffe-Laden</h1>

  <table>
    <tr>
      <th>Art.-Nr.</th>
      <th>Bezeichnung</th>
      <th>Kategorie</th>
      <th>Preis</th>
    </tr>

    <?php
      
    $sql = '';
    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?= $row['artic_id']; ?></td>
              <td><?= $row['artic_short_desc']; ?></td>
              <td><?= $row['categ_desc']; ?></td>
              <td><?= $row['artic_price']; ?> €</td>
            </tr>
          <?php }
        }
      }
    $stmt = NULL;
    $pdo = NULL;
    } catch (PDOException $e) {
      echo 'ERROR:<br>' . $e->getMessage();
    }
      
    ?>
  </table>
</body>
</html>