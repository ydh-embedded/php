<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Post anlegen</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>

<body>
<header> <h1>Post anlegen</h1> </header>


<div class="container">

  

  <?php

  if (isset($_SESSION['users_lastname']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    
    require_once 'includes/init.inc.php';

    
    if( ! empty($_POST) ) {
      $sql = 'INSERT INTO `tbl_posts`
      (
        `posts_categ_id_ref`,
        `posts_header`      ,
        `posts_content`     ,
        `posts_users_id_ref`,
        `posts_image`
      )

      VALUES
      (
        :pcid,
        :ph,
        :pc,
        :puid,
        :pi
      )';

      // Variablen der Formularfelder erzeugen
      $posts_header       = $_POST['posts_header'];
      $posts_content      = $_POST['posts_content'];
      $posts_image        = $_POST['posts_image'];
      // Formular-Zeichenketten in numerische Typen umwandeln
      $posts_categ_id_ref        = intval($_POST['posts_categ_id_ref']);
      $posts_users_id_ref        = intval($_POST['posts_users_id_ref']);
   /* $posts_users_id_ref        = floatval($_POST['posts_users_id_ref']); */

      try {
        if( $stmt = $pdo->prepare($sql) ) {
          $stmt->bindParam(':ph'    , $posts_header)       ;
          $stmt->bindParam(':pc'    , $posts_content)      ;
          $stmt->bindParam(':pi'    , $posts_image)        ;
          $stmt->bindParam(':pcid'  , $posts_categ_id_ref) ;
          $stmt->bindParam(':puid'  , $posts_users_id_ref) ;

          if( $stmt->execute()) {
            /* echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neuen Post anlegen.</a></p>'; */
            echo '<p><a href="11-artikel.php">Zur Übersicht.</a></p>';
            echo '<p>Ihr Blog mit der Bezeichnung ' . $posts_header . ' wurde angelegt.</p>';
          } else {
            echo '<p>Der Post konnte nicht angelegt werden.</p>';
          }
        }

      } catch(PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }


      $stmt = NULL;
      $pdo = NULL;

    } else {
    ?>


      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <div class="PostHeader">
        
        <p>
          Post-Header:<br>
          <input type="text" name="posts_header" style="width: 690px"><br>
        </p>
        
      </div>

      <div  class="PostBody">
        <p>
          Post-Inhalt:<br>
          <input type="text" style="width:690px ; height:400px" name="posts_content"><br>
          
        </p>

        <p>
          Post-Image-Link<br>
          <input type="text" name="posts_image"><br>
        </p>
        
        <p>
          Kategorie-ID<br>
          <select name="posts_categ_id_ref">
            <?php
            // Ausgabe der Kategorien
         /* $sql = 'SELECT `categ_id`, `categ_name` FROM `tbl_categories`'; */
            $sql = 'SELECT `categ_id`, `categ_name` FROM `tbl_categories`';

            try {
              if( $stmt = $pdo->prepare($sql) ) {
                $stmt->execute();
                if( $stmt->rowCount() === 0 ) {
                  echo '<p>Keine Datensätze gefunden.</p>';
                } else {
                  while( $row = $stmt->fetch(PDO::FETCH_OBJ) ): ?>
                    <option value="<?= $row->categ_id; ?>">
                      <?= $row->categ_name; ?>
                    </option>
                  <?php endwhile;
                }
              }

            } catch (PDOException $e) {
              echo get_db_error($pdo, $sql, $e);
            }

            $stmt = NULL;
            $pdo = NULL;

            ?>
          </select>
        </p>

        <p>
          Post-User-ID<br>
          <input type="text" name="posts_users_id_ref">
        </p>

        <p>
          <br>
          <input type="submit" value="Speichern">
        </p>

      </div>
      </form>
    <?php } ?>
    
    <?php else : ?>
    <p>Um einen Post anlegen zu können müssen Sie eingeloggt sein: <a href="02-login.php">zum Login</a>.</p>
  <?php endif;

?>
  </div>

  <footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>

</html>