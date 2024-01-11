<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Post ändern</title>


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
</head>

<body>
<header> <h1>Post ändern</h1> </header>
<div class="container">
  
  <?php
  if (empty($_GET)) {
    // wenn $_GET leer ist zurück zur Übersicht
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
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
              `posts_name` = :pn,
              `posts_short_desc` = :psd,
              `posts_long_desc` = :pld,
              `posts_categ_id_ref` = :pc,
              `posts_price` = :pp
            WHERE `posts_id` = ' . intval($posts_id);

      // Variablen der Formularfelder erzeugen
      $posts_name         = $_POST['posts_name'];
      $posts_short_desc   = $_POST['posts_short_desc'];
      $posts_long_desc    = $_POST['posts_long_desc'];

      // Formular-Zeichenketten in numerische Typen umwandeln
      $posts_categ_id_ref = intval($_POST['posts_categ_id_ref']);
      $posts_price = floatval($_POST['posts_price']);

      try {
        if ($stmt = $pdo->prepare($sql)) {

          $stmt->bindParam(':pn' , $posts_name);
          $stmt->bindParam(':psd', $posts_short_desc);
          $stmt->bindParam(':pld', $posts_long_desc);
          $stmt->bindParam(':pc' , $posts_categ_id_ref);
          $stmt->bindParam(':pp' , $posts_price);

          if ($stmt->execute()) {
            echo '<p>Der Post ' . $posts_name . ' wurde geändert.</p>';
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
      $sql = 'SELECT `posts_id`, `posts_name`, `posts_short_desc`, `posts_long_desc`, `posts_categ_id_ref`, `posts_price`
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
                $o_posts_name = $row->posts_name;
                $o_posts_short_desc = $row->posts_short_desc;
                $o_posts_long_desc = $row->posts_long_desc;
                $o_posts_categ_id_ref = $row->posts_categ_id_ref;
                $o_posts_price = $row->posts_price;
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
          <input type="text" name="posts_name" value="<?= $o_posts_name ?>">
        </p>

        <p>
          ausführliche Beschreibung<br>
          <input type="text" name="posts_long_desc" value="<?= $o_posts_long_desc ?>">
        </p>

        <p>
          Kurzbeschreibung:<br>
          <input type="text" name="posts_short_desc" value="<?= $o_posts_short_desc ?>">
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
          <input type="text" name="posts_price" value="<?= $o_posts_price ?>">
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