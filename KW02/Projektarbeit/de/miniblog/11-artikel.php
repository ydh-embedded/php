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
    <title>Blog-Übersicht</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>
<body>
<header>
    <h1>miniblog</h1>


</header>
  
  <div class="container">


        <table>
                    <tr>
                        <th>Themen-ID</th>
                        <th>Thema</th>
                        <th>Inhalt</th>
                   <!-- <th>Aufrufe</th> -->
                   <!-- <th>Antworten</th> -->
                        <th>letzter Beitrag</th>
                    </tr>
        
            <?php

            $sql = '  SELECT
                            `posts_id`              ,
                            `posts_header`          ,
                            `posts_content`         ,
                            `posts_created_at`      ,
                            `posts_users_id_ref`    ,
                            `posts_categ_id_ref`    ,
                            `posts_image`           ,
                            `posts_updated_at`      ,
                            `categ_id`              ,
                            `categ_name`


                      FROM            `tbl_posts` p
                      JOIN            `tbl_categories` c

                      ON              `p`.`posts_categ_id_ref` = `c`.`categ_id`   '  ;
    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Kein Datensatz Post gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>

              <td><?= $row['posts_id']                  ; ?>  </td>
              <td><?= $row['posts_header']              ; ?>  </td>
              <td><?= $row['posts_content']             ; ?>  </td>
              <td><?= $row['posts_created_at']          ; ?>  </td>
              

              <td><a href="06-artikel-aendern.php?a= <?= $row['posts_id']; ?> " >Post ändern </a></td>
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
  <div class="PostBody">

    <p><a href="06-artikel-aendern.php">  _ Post bearbeiten</a></p><br>
    <p><a href="07-artikel-anlegen.php">  _ Post anlegen</a></p><br>

  </div>
  </div>


  <footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>


</body>
</html>