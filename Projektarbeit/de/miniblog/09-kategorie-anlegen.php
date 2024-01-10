<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
    <!-- Titel
    ============================================================================================= -->
    <title>Thema anlegen</title>
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
<header> <h1>Thema anlegen</h1> </header>
<div class="container">
  
  <?php

  if (isset($_SESSION['users_name']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';

    if (!empty($_POST)) {
      $sql = 'INSERT INTO `tbl_categories`
      ( `categ_name`, `categ_desc` )
      VALUES
      ( :cn, :cd )';

      // Variablen der Formularfelder erzeugen
      $categ_name = $_POST['categ_name'];
      $categ_desc = $_POST['categ_desc'];

      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(':cn', $categ_name);
          $stmt->bindParam(':cd', $categ_desc);

          if ($stmt->execute()) {
            echo '<p>Die Kategorie <b>' . $categ_name . '</b> wurde angelegt.</p>';
            echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neue Kategorie anlegen.</a></p>';
            echo '<p><a href="10-kategorie.php">Zurück zur Übersicht.</a></p>';
          } else {
            echo '<p>Kategorie konnte nicht angelegt werden.</p>';
          }
        }
      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }
      $stmt = NULL;
      $pdo = NULL;
    } else {
    ?>


      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

        <p>
          Kategorie:<br>
          <input type="text" name="categ_name">
        </p>

        <p>
          Beschreibung<br>
          <input type="text" name="categ_desc">
        </p>

        <p><input type="submit" value="Speichern"></p>

      </form>
    <?php } ?>
    <p><a href="10-kategorie.php">Zur Kategorie-Übersicht</a></p>
    <p><a href="index.php">Zur Artikel-Übersicht</a></p>

  <?php else : ?>
    <p>Um ein Thema anlegen zu können müssen Sie eingeloggt sein: <a href="02-login.php">zum Login</a>.</p>
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