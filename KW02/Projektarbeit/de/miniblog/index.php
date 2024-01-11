<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Login</title>

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
        <h1>Der Tec-Blog</h1>
   <!-- <h2>Themen-Übersicht</h2>          -->
   <!-- <h3>bitte loggen Sie sich ein</h3> -->
</header>

<div class="container">
    <div class="nav">
          <div class="button">

<!--        <a href="08-kategorie-aendern.php">Thema ändern                 </a>
            <a href="09-kategorie-anlegen.php">Thema anlegen                </a> -->
            <a href="10-kategorie.php"        ><h2>  Themen Übersicht  </h2></a>

          </div>
    </div>

  </div>
</div>
<footer>

<?php


  require_once 'includes/footer.inc.php';

?>


</footer>
</body>
</html>