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
    <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>
    <p>
        <?php
            
            
        ?>
    </p>

</div>


</footer>
</body>
</html>