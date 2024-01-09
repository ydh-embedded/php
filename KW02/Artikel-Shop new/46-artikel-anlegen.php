<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel anlegen</title>
</head>

<body>
  <h1>Artikel anlegen</h1>
  <?php

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    
    if( ! empty($_POST) ) {
      $sql = 'INSERT INTO `tbl_articles`
      (
        `artic_name`,
        `artic_short_desc`,
        `artic_long_desc`,
        `artic_categ_id_ref`,
        `artic_price`
      )
      VALUES
      (
        :an, :asd, :ald, :ac, :ap
      )';

      // Variablen der Formularfelder erzeugen
      $artic_name = $_POST['artic_name'];
      $artic_short_desc = $_POST['artic_short_desc'];
      $artic_long_desc = $_POST['artic_long_desc'];
      // Formular-Zeichenketten in numerische Typen umwandeln
      $artic_categ_id_ref = intval($_POST['artic_categ_id_ref']);
      $artic_price = floatval($_POST['artic_price']);

      try {
        if( $stmt = $pdo->prepare($sql) ) {
          $stmt->bindParam(':an', $artic_name);
          $stmt->bindParam(':asd', $artic_short_desc);
          $stmt->bindParam(':ald', $artic_long_desc);
          $stmt->bindParam(':ac', $artic_categ_id_ref);
          $stmt->bindParam(':ap', $artic_price);

          if( $stmt->execute()) {
            echo '<p>Der Artikel ' . $artic_name . ' wurde angelegt.</p>';
            echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neuen Artikel anlegen.</a></p>';
          } else {
            echo '<p>Artikel konnte nicht angelegt werden.</p>';
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
          Artikel-Name:<br>
          <input type="text" name="artic_name">
        </p>

        <p>
          ausführliche Bezeichnung<br>
          <input type="text" name="artic_long_desc">
        </p>

        <p>
          Kurzbezeichung:<br>
          <input type="text" name="artic_short_desc">
        </p>

        <p>
          Kategorie:<br>
          <select name="artic_categ_id_ref">
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
          <input type="text" name="artic_price">
        </p>

        <p><input type="submit" value="Speichern"></p>

      </form>
    <?php } ?>

  <?php else : ?>
    <p>Um Artikel anlegen zu können müssen Sie eingeloggt sein: <a href="42-login.php">zum Login</a>.</p>
  <?php endif;

  ?>
</body>

</html>