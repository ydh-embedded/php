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

  if (isset($_SESSION['users_lastname']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?php
    
    require_once 'includes/init.inc.php';

    
    if( ! empty($_POST) ) {
      $sql = 'INSERT INTO `tbl_posts`
      (
        `posts_users_id_ref`,
        `posts_categ_id_ref`,
        `posts_header`      ,
        `posts_content`     ,
        `posts_image`
      )
/*       (
        `posts_name`,
        `posts_short_desc`,
        `posts_long_desc`,
        `posts_categ_id_ref`,
        `posts_price`
      ) */
      VALUES
      (
        :pn,
        :psd,
        :pld,
        :pc,
        :pp
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
          $stmt->bindParam(':pn' , $posts_header)       ;
          $stmt->bindParam(':psd', $posts_content)      ;
          $stmt->bindParam(':pld', $posts_image)        ;
          $stmt->bindParam(':pc' , $posts_categ_id_ref) ;
          $stmt->bindParam(':pp' , $posts_users_id_ref) ;

          if( $stmt->execute()) {
            /* echo '<p><a href="' . $_SERVER['SCRIPT_NAME'] . '">Neuen Post anlegen.</a></p>'; */
            echo '<p><a href="11-artikel.php">Zur Übersicht.</a></p>';
            echo '<p>Ihr ' . $posts_content . ' wurde angelegt.</p>';
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