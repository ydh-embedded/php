<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
</head>
<body>
  <h1>Logout</h1>
  <?php
    
  $_SESSION = array();
  if( session_destroy() ) {
    echo '<p>Sie wurden ausgeloggt.</p>';
    echo '<p>Zum erneuten Anmelden <a href="02-login.php">loggen Sie sich hier ein</a>.</p>';
  } else {
    echo '<p>Das Ausloggen konnte nicht ausgeführt werden.</p>';
  }
    
  ?>
</body>
</html>