<?php
define('DB_NAME', 'miniblog');
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titel
    ============================================================================================= -->
    <title>miniblog</title>
    <!-- Icon
    ============================================================================================= -->
    <link rel="icon" type="images/x-icon" href="https://www.w3docs.com/favicon.ico" />
    <!-- fonts
    ============================================================================================= -->
    <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
    <!-- Bootstrap
    ============================================================================================= -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Web-Fonts
    ============================================================================================= -->
    <link rel="stylesheet" href="css/fonts.css">
    <!-- Style-CSS
    ============================================================================================= -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Style-Buttons-CSS
    ============================================================================================= -->
    <link rel="stylesheet" href="css/style_buttons.css">

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
<header>
        <h1>Der Tec-Blog</h1>
        <h2>Themen-Übersicht</h2>
</header>

<div class="container">
  

  <table>
    <tr>
      <th>Themen-ID</th>
      <th>Themen-Name</th>
      <th>Inhalt</th>
      <th>Aufrufe</th>
      <th>Antworten</th>
      <th>letzter Beitrag</th>
    </tr>

    <?php

    $sql = 'SELECT
              `categ_id`,
              `categ_name`,
              `categ_desc`
              `categ_view_count`
              `categ_post_count`
              `categ_last_post`

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
              <td><a href="08-kategorie-aendern.php?c=<?= $row['categ_id']; ?>">Thema Ändern</a></td>

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
  <p><a href="09-kategorie-anlegen.php">Neues Thema</a></p>
  <p><a href="index.php">Zur Blog-Übersicht</a></p>

  </div>

<footer>

<div
    class="footer">
    <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>
    <p>
        <?php
            
            
        ?>
    </p>

</div>


</footer>
</body>

</html>