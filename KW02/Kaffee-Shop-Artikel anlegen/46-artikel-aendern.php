<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel ändern</title>
</head>

<body>
  <h1>Artikel ändern</h1>
  <?php
  if (empty($_GET)) {
    // wenn $_GET leer ist zurück zur Übersicht
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '40-shop.php';
    header("Location: http://$host$uri/$extra");
    exit;
  }

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    $artic_id = $_GET['a'];

    if (!empty($_POST)) {
      // wenn $_POST nicht leer ist: ändern des DB-Eintrags mit dem Inhalt der Formular-Elemente
      $sql = 'UPDATE `tbl_articles` 
            SET 
              `artic_name` = :an,
              `artic_short_desc` = :asd,
              `artic_long_desc` = :ald,
              `artic_categ_id_ref` = :ac,
              `artic_price` = :ap
            WHERE `artic_id` = ' . intval($artic_id);

      // Variablen der Formularfelder erzeugen
      $artic_name = $_POST['artic_name'];
      $artic_short_desc = $_POST['artic_short_desc'];
      $artic_long_desc = $_POST['artic_long_desc'];
      // Formular-Zeichenketten in numerische Typen umwandeln
      $artic_categ_id_ref = intval($_POST['artic_categ_id_ref']);
      $artic_price = floatval($_POST['artic_price']);

      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(':an', $artic_name);
          $stmt->bindParam(':asd', $artic_short_desc);
          $stmt->bindParam(':ald', $artic_long_desc);
          $stmt->bindParam(':ac', $artic_categ_id_ref);
          $stmt->bindParam(':ap', $artic_price);

          if ($stmt->execute()) {
            echo '<p>Der Artikel ' . $artic_name . ' wurde geändert.</p>';
            echo '<p><a href="40-shop.php">Zurück zur Übersicht.</a></p>';
          } else {
            echo '<p>Artikel konnte nicht geändert werden.</p>';
          }
        }
      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }
      $stmt = NULL;
      $pdo = NULL;
    } else {
      // wenn $_POST leer  ist, Abfrage der Kategorien und Ausgabe des Formulars
      $sql = 'SELECT `artic_id`, `artic_name`, `artic_short_desc`, `artic_long_desc`, `artic_categ_id_ref`, `artic_price`
              FROM `tbl_articles`
              WHERE `artic_id` = ?';
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(1, $artic_id);
          try {
            if ($stmt->execute()) {
              if ($stmt->rowCount() === 0) {
                exit('<p>kein Artikel gefunden</p>');
              } else {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $o_artic_name = $row->artic_name;
                $o_artic_short_desc = $row->artic_short_desc;
                $o_artic_long_desc = $row->artic_long_desc;
                $o_artic_categ_id_ref = $row->artic_categ_id_ref;
                $o_artic_price = $row->artic_price;
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

      <!-- Formular-Aufruf mit Übergabe der Artikel-ID als Query-String an URL -->
      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?a=<?= $artic_id; ?>" method="post">
        

        <p>
          Artikel-Name:<br>
          <input type="text" name="artic_name" value="<?= $o_artic_name ?>">
        </p>

        <p>
          ausführliche Bezeichnung<br>
          <input type="text" name="artic_long_desc" value="<?= $o_artic_long_desc ?>">
        </p>

        <p>
          Kurzbezeichung:<br>
          <input type="text" name="artic_short_desc" value="<?= $o_artic_short_desc ?>">
        </p>

        <p>
          Kategorie:<br>
          <select name="artic_categ_id_ref">
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
                    <option value="<?= $row->categ_id; ?>" <?= ($row->categ_id == $o_artic_categ_id_ref) ? 'selected' : ''; ?>>
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
          <input type="text" name="artic_price" value="<?= $o_artic_price ?>">
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