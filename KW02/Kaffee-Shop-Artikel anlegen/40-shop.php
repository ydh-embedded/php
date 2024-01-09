<?php 
define( 'DB_NAME', 'shop' );
require_once 'includes/pdo-connect.inc.php'; 
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaffee & mehr</title>
  <style>
            table,
            th,
            td {border: 1px solid gray;}
            th,
            td {padding: 5px;}
  </style>
</head>
<body>
  <h1>Der Kaffee-Laden</h1>

  <table>
              <tr>
                <th>Art.-Nr.</th>
                <th>Bezeichnung</th>
                <th>Kategorie</th>
                <th>Preis</th>
                <th>Aktion</th>
              </tr>

    <?php
      
    $sql = 'SELECT
                    `artic_id`      ,
                    `artic_name`    ,
                    `categ_id`      ,
                    `categ_name`    ,
                    `artic_price`
            FROM    `tbl_articles` a
            JOIN    `tbl_categories` c
            ON      `a`.`artic_categ_id_ref` = `c`.`categ_id`'  ;
    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?= $row['artic_id']    ; ?>  </td>
              <td><?= $row['artic_name']  ; ?>  </td>
              <td><?= $row['categ_name']  ; ?>  </td>
              <td><?= $row['artic_price'] ; ?> €</td>
              <td><a href="46-artikel-aendern.php?a= <?= $row['artic_id']; ?> " >Ändern </a></td>
              <!-- <td><a href="46-artikel-aendern.php?a= <?= $row['artic_id']; ?> " >Ändern </a></td> -->
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
  <p><a href="46-kategorien.php">Kategorien bearbeiten</a></p>
</body>
</html>