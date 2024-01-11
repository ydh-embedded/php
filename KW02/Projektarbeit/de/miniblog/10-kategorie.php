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
    <title>miniblog</title>
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

  <style>

    table,
    th,
    td {
      border: 1px solid gray;
    }

    th,
    td {
      padding: 5px;
    }
  </style>

</head>

<body>
<header>
        <h1>Der Tec-Blog</h1>
        <h2>Themen-Übersicht</h2>
</header>

<div class="container">
  

  <table>
    <tr>
      <th>Themen-ID</th>
      <th>Themen-Name</th>
      <th>Inhalt</th>
      <th>Aufrufe</th>
      <th>Antworten</th>
      <th>letzter Beitrag</th>
    </tr>

    <?php

    $sql = 'SELECT
              `categ_id`          ,
              `categ_name`        ,
              `categ_desc`        ,
              `categ_view_count`  ,
              `categ_post_count`  ,
              `categ_lastpost`

            FROM `tbl_categories`';

    try {
      if ($stmt = $pdo->query($sql)) {
        if ($stmt->rowCount() === 0) {
          echo '<p>Keine Datensätze gefunden.</p>';
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

          <div class="TableBody">
            <tr>

              <td><code><?= $row['categ_id']; ?></code></td>
              <td><?= $row['categ_name']; ?></td>
              <td><?= $row['categ_desc']; ?></td>
              <td><?= $row['categ_view_count']; ?></td>
              <td><?= $row['categ_post_count']; ?></td>
              <td><?= $row['categ_lastpost']; ?></td>
              
            </tr>
          </div>

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

        <p><a href="09-kategorie-anlegen.php">Neues Thema anlegen</a></p>
        <p><a href="07-artikel-anlegen.php">Neuen Blogpost anlegen</a></p>
  <!--  <p><a href="08-kategorie-aendern.php?">Thema Ändern</a></p> -->


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