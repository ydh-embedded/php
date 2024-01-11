<?php
    require_once 'includes/init.inc.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Registrierung</title>


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

            $sql = '  SELECT
                            `posts_id`              ,
                            `posts_users_id_ref`    ,
                            `posts_categ_id_ref`    ,
                            `posts_header`          ,
                            `posts_content`         ,
                            `posts_image`           ,
                            `posts_created_at`      ,
                            `posts_updated_at`


                      FROM            `tbl_categories` c
                      JOIN            `tbl_posts` p

                      ON              `p`.`posts_categ_id_ref` = `c`.`categ_id`   '  ;
    
    try {
      if ($stmt = $pdo->query($sql)) {
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Kein Datensatz Post gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>

              <td><?= $row['posts_id']                  ; ?>  </td>
              <td><?= $row['posts_users_id_ref']        ; ?>  </td>
              <td><?= $row['posts_categ_id_ref']        ; ?>  </td>
              <td><?= $row['posts_header']              ; ?>  </td>
              <td><?= $row['posts_content']             ; ?>  </td>
              <td><?= $row['posts_image']               ; ?>  </td>
              <td><?= $row['posts_created_at']          ; ?>  </td>
              <td><?= $row['posts_updated_at']          ; ?>  </td>

              <td><a href="06-artikel-aendern.php?a= <?= $row['posts_id']; ?> " >Post ändern </a></td>
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
  <div class="PostBody">

    <p><a href="06-artikel-aendern.php">  _ Post bearbeiten</a></p><br>
    <p><a href="07-artikel-anlegen.php">  _ Post anlegen</a></p><br>

  </div>
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