<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Post ändern</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>

<body>
<header> <h1>Post ändern</h1> </header>
<div class="container">
  
  <?php
  if (empty($_GET)) {
    // wenn $_GET leer ist zurück zur Übersicht
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '02-login.php';
    header("Location: http://$host$uri/$extra");
    exit;
  }

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    define('DB_NAME', 'miniblog');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    $posts_id = $_GET['p'];

    if (!empty($_POST)) {
      // wenn $_POST nicht leer ist: ändern des DB-Eintrags mit dem Inhalt der Formular-Elemente

    //$sql = 'UPDATE `tbl_articles`
      $sql = 'UPDATE `tbl_posts`
            SET
              `posts_header`  = :pn,
              `posts_content` = :psd,
              `posts_image`   = :pld,
              `posts_categ_id_ref` = :pc,
              `post_users_id_ref`   = :pp
            WHERE `posts_id` = ' . intval($posts_id);

      // Variablen der Formularfelder erzeugen
      $posts_header         = $_POST['posts_header'];
      $posts_content        = $_POST['posts_content'];
      $posts_image          = $_POST['posts_image'];

      // Formular-Zeichenketten in numerische Typen umwandeln
      $posts_categ_id_ref   = intval($_POST['posts_categ_id_ref']);
      $posts_users_id_ref          = floatval($_POST['posts_users_id_ref']);

      try {
        if ($stmt = $pdo->prepare($sql)) {

          $stmt->bindParam(':pn' , $posts_header);
          $stmt->bindParam(':psd', $posts_content);
          $stmt->bindParam(':pld', $posts_image);
          $stmt->bindParam(':pc' , $posts_categ_id_ref);
          $stmt->bindParam(':pp' , $posts_users_id_ref);

          if ($stmt->execute()) {
            echo '<p>Der Post ' . $posts_header . ' wurde geändert.</p>';
            echo '<p><a href="index.php">Zurück zur Übersicht.</a></p>';
          } else {
            echo '<p>Post konnte nicht geändert werden.</p>';
          }
        }


      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }


      $stmt = NULL;
      $pdo = NULL;



    } else {
      // wenn $_POST leer  ist, Abfrage der Kategorien und Ausgabe des Formulars
      $sql = 'SELECT `posts_id`, `posts_header`, `posts_content`, `posts_image`, `posts_categ_id_ref`, `posts_users_id_ref`
              FROM `tbl_posts`
              WHERE `posts_id` = ?';
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(1, $posts_id);
          try {
            if ($stmt->execute()) {
              if ($stmt->rowCount() === 0) {
                exit('<p>kein Post gefunden</p>');
              } else {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $o_posts_header = $row->posts_header;
                $o_posts_content = $row->posts_content;
                $o_posts_image = $row->posts_image;
                $o_posts_categ_id_ref = $row->posts_categ_id_ref;
                $o_post_users_id_ref = $row->post_users_id_ref;
              }
            }
          } catch (PDOException $e) {
            echo get_db_error($pdo, $sql, $e);
          }
        }
      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }
    ?>

      <!-- Formular-Aufruf mit Übergabe der Post-ID als Query-String an URL -->
      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?a=<?= $posts_id; ?>" method="post">
        

        <p>
          Post-Name:<br>
          <input type="text" name="posts_header" value="<?= $o_posts_header ?>">
        </p>

        <p>
          ausführliche Beschreibung<br>
          <input type="text" name="posts_image" value="<?= $o_posts_image ?>">
        </p>

        <p>
          Kurzbeschreibung:<br>
          <input type="text" name="posts_content" value="<?= $o_posts_content ?>">
        </p>

        <p>
          Post Kategorie ID:<br>
          <select name="posts_categ_id_ref">
            <?php

            // Ausgabe der Kategorien


            $sql = 'SELECT `categ_id`, `categ_name` FROM `tbl_categories`';

            try {
              if ($stmt = $pdo->prepare($sql)) {
                $stmt->execute();
                if ($stmt->rowCount() === 0) {
                  echo '<p>Keine Datensätze gefunden.</p>';
                } else {
                  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                    <!-- Wenn die Original-Kategorie-ID mit der Kategorie-ID der Schleife übereinstimmt wird das Attribut "selected" für das Option-Element ausgegeben -->
                    <option value="<?= $row->categ_id; ?>" <?= ($row->categ_id == $o_posts_categ_id_ref) ? 'selected' : ''; ?>>
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
          Preis:<br>
          <input type="text" name="post_users_id_ref" value="<?= $o_post_users_id_ref ?>">
        </p>

        <p><input type="submit" value="Speichern"></p>

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