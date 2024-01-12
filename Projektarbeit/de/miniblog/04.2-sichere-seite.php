<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Die sichere Seite</title>

    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>

<body>
<header> <h1>Eine sichere Seite</h1> </header>
<div class="container">
  <div class="block">

    <?php

// Prüfung ob ein User eingeloggt ist
if (isset($_SESSION['user_lastname']) && ($_SESSION['is_logged_in'] === true)) {
    echo '<p>Korrekt eingeloggt. Der Inhalt ist freigegeben</p>';
  } else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

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
</div>


  <footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>






</body>

</html>