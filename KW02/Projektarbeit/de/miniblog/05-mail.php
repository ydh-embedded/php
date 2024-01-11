<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Mail versenden</title>

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
<header> <h1>Mail versenden</h1> </header>
<div class="container">
  

  <?php
    
  use PHPMailer\PHPMailer\PHPMailer;
  if(!empty($_POST)) {
    include 'PHPMailer-master/src/PHPMailer.php';

    $mail           = new PHPMailer()       ;
    $mail->From     = 'webmaster@abc.com'   ;
    $mail->FromName = 'Arnold Absender'     ;
    $mail->Subject  = $_POST['betreff']     ;

    // HTML-Variante des Mail-Textes
    $mail->Body = '<h2>' . $_POST['thema'] . '</h2>';
    $mail->Body .= '<p>' . nl2br($_POST['nachricht'], false) . '</p>';

    // Nur-Text-Variante
    $mail->AltBody = 'Thema: ' . $_POST['thema'];
    $mail->AltBody .= "\r\nNachricht:\r\n";
    $mail->AltBody .= $_POST['nachricht'];

    $mail->addAddress( $_POST['empf_adresse'] );
    $mail->addCC( $_POST['cc_adresse'] );

    $mail->addAttachment( 'PHP-Projekt-Blog-2024-01.pdf' );

    if( $mail->Send() ) {
      echo '<p>Mail wurde versendet.</p>';
    } else {
      echo '<p>Mail konnte nicht versendet werden.</p>';
    }
  }
    
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <p>      Empfänger:   <input type="email" name="empf_adresse">  </p>
    <p>      CC:          <input type="email" name="cc_adresse">    </p>
    <p>      Betreff:     <input type="text" name="betreff">        </p>
    <p>      Thema:

                          <select name="thema">
                            <option>Anfrage</option>
                            <option>Beschwerde</option>
                            <option>Rückgabe</option>
                          </select>
    </p>

    <p>
      Ihre Nachricht:
      <textarea name="nachricht" cols="30" rows="10"></textarea>
    </p>

    <p><input type="submit" value="Senden"></p>
  </form>
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