<?php session_start(); ?>



<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Thema ändern</title>


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
<header> <h1>Thema ändern</h1> </header>
<div class="container">
  
  <?php
  if (empty($_GET)) {
    // wenn $_GET leer ist zurück zur Übersicht
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '09-kategorie-anlegen.php';
    
    header("Location: http://$host$uri/$extra");
    exit;
  }

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php

    require_once 'includes/init.inc.php';

    $categ_id = $_GET['c'];

    if (!empty($_POST)) {
      // wenn $_POST nicht leer ist: ändern des DB-Eintrags mit dem Inhalt der Formular-Elemente
      $sql = 'UPDATE `tbl_categories`
            SET
              `categ_name` = :cn,
              `categ_desc` = :cd
            WHERE `categ_id` = ' . intval($categ_id);

      // Variablen der Formularfelder erzeugen
      $categ_name = $_POST['categ_name'];
      $categ_desc = $_POST['categ_desc'];

      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(':cn', $categ_name);
          $stmt->bindParam(':cd', $categ_desc);

          if ($stmt->execute()) {
            echo '<p>Die Kategorie <b>' . $categ_name . '</b> wurde geändert.</p>';
            echo '<p><a href="10-kategorie.php">Zurück zur Übersicht.</a></p>';
          } else {
            echo '<p>Kategorie konnte nicht geändert werden.</p>';
          }
        }

      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }

      $stmt = NULL;
      $pdo = NULL;

    } else {
      // wenn $_POST leer  ist, Abfrage der Kategorien und Ausgabe des Formulars
      $sql = 'SELECT `categ_id`, `categ_name`, `categ_desc`
              FROM `tbl_categories`
              WHERE `categ_id` = ?';
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(1, $categ_id);
          try {
            if ($stmt->execute()) {
              if ($stmt->rowCount() === 0) {
                exit('<p>keine Kategorie gefunden</p>');
              } else {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $o_categ_name = $row->categ_name;
                $o_categ_desc = $row->categ_desc;
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
      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?c=<?= $categ_id; ?>" method="post">
        

        <p>
          Kategorie:<br>
          <input type="text" name="categ_name" value="<?= $o_categ_name ?>">
        </p>

        <p>
          Beschreibung<br>
          <input type="text" name="categ_desc" value="<?= $o_categ_desc ?>">
        </p>

        <p><input type="submit" value="Speichern"></p>

      </form>
    <?php } ?>

  <?php else : ?>
    <p>Um Kategorien anlegen zu können müssen Sie eingeloggt sein: <a href="02-login.php">zum Login</a>.</p>
  <?php endif;

  ?>
  </div>

  <footer>

<div
    class="footer">


    <div class="nav">

        <a href="01-registrierung.php"    >__Registrieren</a>
        <a href="02-login.php"            >__Login</a>
        <a href="03-logout.php"           >__Logout</a>
        <!-- <a href="04-sichere-seite.php"    ></a> -->
        <a href="05-mail.php"             >__Mail</a>
        <!-- <a href="06-artikel-aendern.php"  >__Post ändern</a> -->
        <!-- <a href="07-artikel-anlegen.php"  >__Post anlegen</a> -->
        <!-- <a href="08-kategorie-aendern.php">__Thema ändern</a> -->
        <!-- <a href="09-kategorie-anlegen.php">__Thema anlegen</a> -->
        <a href="10-kategorie.php"        >__Thema bearbeiten</a>
        <a href="11-artikel.php"          >__Post Übersicht</a>
        <a href="99-cookies.php"          >__Datenschutz-Bestimmung</a>

    </div>

    <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>

</div>


</footer>
</body>

</html>