<?php session_start(); ?>


<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Post anlegen</title>


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
<header> <h1>Post anlegen</h1> </header>
<div class="container">

  

  <?php

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    
    if( ! empty($_POST) ) {
      $sql = 'INSERT INTO `tbl_posts`
      (
        `posts_name`,
        `posts_short_desc`,
        `posts_long_desc`,
        `posts_categ_id_ref`,
        `posts_price`
      )
      VALUES
      (
        :pn,
        :psd,
        :pld,
        :pc,
        :pp
      )';

      // Variablen der Formularfelder erzeugen
      $posts_name       = $_POST['posts_name'];
      $posts_short_desc = $_POST['posts_short_desc'];
      $posts_long_desc  = $_POST['posts_long_desc'];
      // Formular-Zeichenketten in numerische Typen umwandeln
      $posts_categ_id_ref = intval($_POST['posts_categ_id_ref']);
      $posts_price        = floatval($_POST['posts_price']);

      try {
        if( $stmt = $pdo->prepare($sql) ) {
          $stmt->bindParam(':pn', $posts_name);
          $stmt->bindParam(':psd', $posts_short_desc);
          $stmt->bindParam(':pld', $posts_long_desc);
          $stmt->bindParam(':pc', $posts_categ_id_ref);
          $stmt->bindParam(':pp', $posts_price);

          if( $stmt->execute()) {
            echo '<p>Ihr Post ' . $posts_name . ' wurde angelegt.</p>';
            echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neuen Post anlegen.</a></p>';
            echo '<p><a href="index.php">Zurück zur Übersicht.</a></p>';
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

        <p>
          Post-Name:<br>
          <input type="text" name="posts_name">
        </p>

        <p>
          ausführliche Bezeichnung<br>
          <input type="text" name="posts_long_desc">
        </p>

        <p>
          Kurzbezeichung:<br>
          <input type="text" name="posts_short_desc">
        </p>

        <p>
          Kategorie:<br>
          <select name="posts_categ_id_ref">
            <?php

            // Ausgabe der Kategorien


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
          Preis:<br>
          <input type="text" name="posts_price">
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