<?php
        define( 'DB_NAME', 'miniblog' );
        require_once 'includes/_pdo-connect.inc.php';
        require_once 'includes/_functions.inc.php';
?>



<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
            table,
            th,
            td {border: 0.2px solid gray;}
            th,
            td {padding: 3px;}
    </style>
</head>


<body>
  <h1>Blog-Übersicht</h1>

  <table>
            <tr>
                <th>Themen-ID</th>
                <th>Thema</th>
                <th>Inhalt</th>
                <th>Aufrufe</th>
                <th>Antworten</th>
                <th>letzter Beitrag</th>
            </tr>

    <?php

    $sql = 'SELECT
                    `categ_id`              ,
                    `categ_name`            ,
                    `categ_desc`            ,
                    `categ_view_count`      ,
                    `categ_post_count`      ,
                    `categ_last_post`       ,

            //!     reihenfolge beachten
            FROM    `tbl_categories` c
            JOIN    `tbl_articles` a
            ON      `a`.`artic_categ_id_ref` = `c`.`categ_id`'  ;

    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?= $row['categ_id']          ; ?>  </td>
              <td><?= $row['categ_name']        ; ?>  </td>
              <td><?= $row['categ_desc']        ; ?>  </td>
              <td><?= $row['categ_view_count']  ; ?>  </td>
              <td><?= $row['categ_post_count']  ; ?>  </td>
              <td><?= $row['categ_last_post']   ; ?>  </td>
              <td><a href="6-blog-aendern.php?a= <?= $row['categ_id']; ?> " >Ändern </a></td>
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