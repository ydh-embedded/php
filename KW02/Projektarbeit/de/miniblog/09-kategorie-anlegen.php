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
<div class="headersmall">

</div>
<div class="container">
  
  <?php

  if (isset($_SESSION['users_lastname']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php

    require_once 'includes/init.inc.php';


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
            echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neues Thema anlegen.</a></p>';
            echo '<p><a href="10-kategorie.php">Zurück zu den Themen.</a></p>';
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


      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>"  method="post">

        <p>
          Thema:<br>
          <input type="text" name="categ_name" style="width:690px ; height: none"><br>
        </p>



        <p>
          Beschreibung<br>
          <input type="text" name="categ_desc" style="width:690px ; height:400px"><br>
        </p>




        <p><input type="submit" value="Speichern"></p>

      </form>
    <?php } ?>

    <p><a href="10-kategorie.php">Zur Themen-Übersicht</a></p>
    <p><a href="11-artikel.php">Zur Post-Übersicht</a></p>

  <?php else : ?>

    <p>Um ein Thema anlegen zu können müssen Sie eingeloggt sein: <a href="02-login.php">zum Login</a>.</p>

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