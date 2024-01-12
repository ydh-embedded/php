<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Die sichere Seite</title>

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
<header> <h1>Eine sichere Seite</h1> </header>
<div class="container">
  
  <?php

  // Prüfung ob ein User eingeloggt ist
  if (isset($_SESSION['user_lastname']) && ($_SESSION['is_logged_in'] === true)) {
    echo '<p>Korrekt eingeloggt. Der Inhalt ist freigegeben</p>';
  } else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '07-artikel-anlegen.php';
    $extra = '09-kategorie-anlegen.php';
    $extra = '10-kategorie.php';
    
    echo "<p>$host<br>$uri<br>$extra</p>";
    echo '<pre>', var_dump( $host ), '</pre>';
    echo '<pre>', var_dump( $uri ), '</pre>';
    echo '<pre>', var_dump( $extra ), '</pre>';

    echo "<p><a href='http://$host$uri/$extra'>Logout</a></p>";

    // automatische Weiterleitung
    header("Location: http://$host$uri/$extra");
  }

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