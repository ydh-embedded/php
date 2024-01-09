<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Die sichere Seite</title>
</head>

<body>
  <h1>Eine sichere Seite</h1>
  <?php

  // Prüfung ob ein User eingeloggt ist
  if (isset($_SESSION['user_name']) && ($_SESSION['is_logged_in'] === true)) {
    echo '<p>Korrekt eingeloggt. Der Inhalt ist freigegeben</p>';
  } else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '46-artikel-anlegen.php';
    
    echo "<p>$host<br>$uri<br>$extra</p>";

    echo "<p><a href='http://$host$uri/$extra'>Logout</a></p>";

    // automatische Weiterleitung
    header("Location: http://$host$uri/$extra");
  }

  ?>
</body>

</html>