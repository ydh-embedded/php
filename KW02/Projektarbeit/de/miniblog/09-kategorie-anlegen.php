<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
    <!-- Titel
    ============================================================================================= -->
    <title>Thema anlegen</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
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
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>

</html>