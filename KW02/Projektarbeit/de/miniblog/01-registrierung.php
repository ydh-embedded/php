<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Registrierung</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>
<body>
  <header> <h1>Registrierung</h1> </header>
<div class="container">

  

  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if(!empty($_POST)) {
    define('DB_NAME', 'miniblog');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'PHPMailer-master/src/PHPMailer.php';
    require_once 'PHPMailer-master/src/Exception.php';

    /**
     * ? Für dieses Beispiel verzichten wir auf die Verifizierung der Daten, wie z.B. korrekte E-Mail-Synthax, Länge des Passwortes, verwendete Zeichen usw. 
     * */
    $u_name       = $_POST['u_name'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $adminAddress = 'webmaster@mail.org';
    
    // Texte für Mails im HTML- und Nur-Text-Format vorbereiten
    $mail_html  = "<h1>Hallo $u_name</h1>";
    $mail_html .= '<p>Schön, dass Du Dich bei uns registriert hast.</p>';
    $mail_html .= "<p>Du kannst Dich jetzt mit deinem Benutzernamen: <b>$u_name</b> und deinem gewählten Passwort anmelden.</p>";

    $mail_txt  = "Hallo $u_name\r\n\r\n";
    $mail_txt .= "Schön, dass Du Dich registriert hast.\r\n";
    $mail_txt .= "Du kannst Dich jetzt mit deinem Benutzernamen $u_name und deinem gewählten Passwort anmelden.";

    $mail           = new PHPMailer();
    $mail->From     = $adminAddress;
    $mail->FromName = 'Webmaster';
    $mail->Subject  = 'Registrierung erfolgreich';

    $mail->Body = $mail_html;
    $mail->AltBody = $mail_txt;

    $mail->addAddress($email);
    $mail->addReplyTo($adminAddress);

    // SQL-Anweisung und Datenbank-Abfrage durchführen
    // ppi
      $sql = 'INSERT INTO `tbl_users`
      (
        `users_lastname`,`users_email`, `users_password`
      )
      VALUES
      (
        :un, :ue, :up
      )';
      
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam( ':un', $u_name );
          $stmt->bindParam( ':ue', $email );

          // ! Passwort-Verschlüsselung durch die PHP-Funktion password_hash()

          $password_hash = password_hash( $password, PASSWORD_DEFAULT );
          $stmt->bindParam(':up', $password_hash);
    
          if( $stmt->execute() ) {
            echo '<p>Sie wurden erfolgreich registriert.  <a href="02-login.php">Weiter zum <b>Login</b></a></p>';
            
            if( $mail->Send() ) {
              echo "<p>Ein E-Mail wurde an die Mail-Adresse <b>$email</b> versendet.</p>";
            } else {
              echo "<p>Es konnte wegen defektem Mail-Server keine Mail an folgende Adresse <b>$email</b><br>
              versendet werden. Bitte wenden Sie sich an den Admin.</p>";
            }
            echo '<p></p>';
          }
        }
      } catch (PDOException $e) {
        echo get_db_error($pdo, $sql, $e);
      }
    }
      $stmt = NULL;
      $pdo = NULL;
    
  
    
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
      <label for="u_name">Benutzername</label><br>
      <input type="text" name="u_name" id="u_name" style="width:750px ; height:none">
    </p>

    <p>
      <label for="email">E-Mail-Adresse</label><br>
      <input type="email" name="email" id="email" style="width:750px ; height:none">
    </p>

    <p>
      <label for="password">Passwort</label><br>
      <input type="password" name="password" id="password" style="width:750px ; height:none">
    </p>

    <p>
      <input type="submit" value="registrieren">
    </p>



  </form>
</div>


<footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>








</body>
</html>