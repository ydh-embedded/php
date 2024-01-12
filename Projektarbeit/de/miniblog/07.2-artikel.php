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
    <title>Registrierung</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>

</head>
<body>
<header>    <h1>miniblog</h1>   </header>


<div class="container">



  <table>
              <tr>
                  <th>Post-ID</th>
                  <th>Blog-Benutzer-ID-Referenz</th>
                  <th>Themen-ID-Referenz</th>
                  <th>Thema</th>
                  <th>Post-Inhalt</th>
                  <th><img src="img/img.PNG" alt="Bild link"></th>
                  <th>Aufrufe</th>
                  <th>Antworten</th>
                  <th>letzter Beitrag</th>
              </tr>
  
      <?php

            $sql = '  SELECT
                    `posts_id`              ,
                    `posts_users_id_ref`    ,
                    `posts_categ_id_ref`    ,
                    `posts_header`          ,
                    `posts_content`         ,
                    `posts_image`           ,
                    `posts_created_at`      ,
                    `posts_updated_at`

            FROM    `tbl_posts` p
            JOIN    `tbl_categories` c
            ON      `p`.`posts_categ_id_ref` = `c`.`categ_id`'  ;

    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {

            

        } else {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>

            <td><?= $row['posts_id']                  ; ?>  </td>
            <td><?= $row['posts_users_id_ref']        ; ?>  </td>
            <td><?= $row['posts_categ_id_ref']        ; ?>  </td>
            <td><?= $row['posts_header']              ; ?>  </td>
            <td><?= $row['posts_content']             ; ?>  </td>
            <td><?= $row['posts_image']               ; ?>  </td>
            <td><?= $row['posts_created_at']          ; ?>  </td>
            <td><?= $row['posts_updated_at']          ; ?>  </td>
            <td><a href="06-artikel-aendern.php?p=      <?= $row['posts_id']; ?> " > Post ändern </a></td>

            </tr>
        <?php }
        }
      }

    $stmt   = NULL;
    $pdo    = NULL;

    } catch (PDOException $e) { echo 'ERROR:<br>' . $e->getMessage(); }

        ?>

  </table>
  <p><a href="10-kategorie.php">Blog Übersicht</a></p>
</div>

<footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>
</html>