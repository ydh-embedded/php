<?php session_start(); ?>
<?php
    require_once 'includes/init.inc.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titel
    ============================================================================================= -->
    <title>miniblog</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>

  <style>



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
              `categ_id`          ,
              `categ_name`        ,
              `categ_desc`        ,
              `categ_view_count`  ,
              `categ_post_count`  ,
              `categ_lastpost`

            FROM `tbl_categories`';

    try {
      if ($stmt = $pdo->query($sql)) {
        if ($stmt->rowCount() === 0) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

          <div class="TableBody">
            <tr>

              <td><code><?= $row['categ_id']; ?></code></td>
              <td><?= $row['categ_name']; ?></td>
              <td><?= $row['categ_desc']; ?></td>
              <td><?= $row['categ_view_count']; ?></td>
              <td><?= $row['categ_post_count']; ?></td>
              <td><?= $row['categ_lastpost']; ?></td>
              
            </tr>
          </div>

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

        <p><a href="09-kategorie-anlegen.php">Neues Thema anlegen</a></p>
        <p><a href="07-artikel-anlegen.php">Neuen Blogpost anlegen</a></p>
  <!--  <p><a href="08-kategorie-aendern.php?">Thema Ändern</a></p> -->


  </div>

  <footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>
</html>