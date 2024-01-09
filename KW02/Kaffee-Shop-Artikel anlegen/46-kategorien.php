<?php
define('DB_NAME', 'shop');
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaffe & mehr</title>
  <style>
    table,
    th,
    td {
      border: 1px solid gray;
    }

    th,
    td {
      padding: 5px;
    }
  </style>
</head>

<body>
  <h1>Der Kaffe-Laden</h1>
  <h2>Kategorie-Übersicht</h2>

  <table>
    <tr>
      <th>Kat.-Nr.</th>
      <th>Name</th>
      <th>Beschreibung</th>
      <th>Aktion</th>
    </tr>

    <?php

    $sql = 'SELECT 
              `categ_id`,
              `categ_name`,
              `categ_desc`
            FROM `tbl_categories`';

    try {
      if ($stmt = $pdo->query($sql)) {
        if ($stmt->rowCount() === 0) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?= $row['categ_id']; ?></td>
              <td><?= $row['categ_name']; ?></td>
              <td><?= $row['categ_desc']; ?></td>
              <td><a href="46-kategorie-aendern.php?c=<?= $row['categ_id']; ?>">Ändern</a></td>
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
  <p><a href="46-kategorie-anlegen.php">Neue Kategorie</a></p>
  <p><a href="40-shop.php">Zur Artikel-Übersicht</a></p>
</body>

</html>