<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Logout</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>
<body>

<header> <h1>Logout</h1> </header>

<div class="container">
  <div class="block">

    <?php
    
    $_SESSION = array();
    if( session_destroy() ) {
      echo '<h3>Sie wurden <b>ausgeloggt</b>. Zum erneuten Anmelden <a href="02-login.php">loggen Sie sich hier ein</h3>';
      
    } else {
      echo '<p>Das Ausloggen konnte nicht ausgeführt werden.</p>';
    }
    
    ?>

  </div>
</div>

<footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>
</html>