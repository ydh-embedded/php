<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Logout</title>

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

<div
    class="footer">
    <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>
    <p>
        <?php
            
            
        ?>
    </p>

</div>


</footer>
</body>
</html>