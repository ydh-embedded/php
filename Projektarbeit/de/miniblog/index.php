<?php
define( 'DB_NAME', 'miniblog' );
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Beschreibung Keywords
    ============================================================================================= -->
    <meta name="viewport"       content="width=device-width, initial-scale=1.0"         >
    <meta name="description"    content="Blog Page als Miniblog für Coding Tech iOT "   >
    <meta name="keywords"       content="Blog Page als Miniblog für Coding Tech iOT "   >

    <!-- Titel
    ============================================================================================= -->
    <title>Mini-Blog</title>
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


    <?php
                use PHPMailer\PHPMailer\PHPMailer;
    ?>

</head>
<body>
<header>
    <h1>miniblog</h1>


</header>
  
  <div class="container">
  
    

        <table>
                    <tr>
                        <th>Themen-ID</th>
                        <th>Thema</th>
                        <th>Inhalt</th>
                        <th>Aufrufe</th>
                        <th>Antworten</th>
                        <th>letzter Beitrag</th>
                    </tr>
        
            <?php
        
            $sql = 'SELECT
                            `categ_id`              ,
                            `categ_name`            ,
                            `categ_desc`            ,
                            `categ_view_count`      ,
                            `categ_post_count`      ,
                            `categ_last_post`       ,
        

            FROM            `tbl_categories` c
            JOIN            `tbl_posts` p

            ON              `p`.`posts_categ_id_ref` = `c`.`categ_id`'  ;
    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Kein Datensatz Post gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?= $row['categ_id']          ; ?>  </td>
              <td><?= $row['categ_name']        ; ?>  </td>
              <td><?= $row['categ_desc']        ; ?>  </td>
              <td><?= $row['categ_view_count']  ; ?>  </td>
              <td><?= $row['categ_post_count']  ; ?>  </td>
              <td><?= $row['categ_last_post']   ; ?>  </td>

              <td><a href="06-artikel-aendern.php?a= <?= $row['categ_id']; ?> " >Thema Ändern </a></td>
            </tr>
          <?php }
        }
      }
  
    $stmt = NULL;
    $pdo = NULL;
  
  
    } catch (PDOException $e) {
      echo 'ERROR:<br>' . $e->getMessage();
    }
      
    ?>
  </table>
  <p><a href="10-kategorie.php">Thema bearbeiten</a></p>
  </div>


  <footer>

    <div
        class="footer">


        <div class="nav">
          <div class="button">

            <a href="01-registrierung.php"    >Registrieren</a>
            <a href="02-login.php"            >Login</a>
            <a href="03-logout.php"           >Logout</a>
            <a href="04-sichere-seite.php"    ></a>
            <a href="05-mail.php"             >Mail</a>
            <a href="06-artikel-aendern.php"  >Post ändern</a>
            <a href="07-artikel-anlegen.php"  >Post anlegen</a>
            <a href="08-kategorie-aendern.php">Thema ändern</a>
            <a href="09-kategorie-anlegen.php">Thema anlegen</a>
            <a href="10-kategorie.php"        >Thema bearbeiten</a>

          </div>
        </div>

        <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>
        <p>
            <?php
                
                
            ?>
        </p>

    </div>


</footer>


</body>
</html>