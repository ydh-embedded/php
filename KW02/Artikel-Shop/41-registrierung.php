<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrierung</title>
</head>
<body>
  <h1>Registrierung</h1>

  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if(!empty($_POST)) {
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';
    //?require_once 'PHPMailer-master/src/PHPMailer.php';
    //?require_once 'PHPMailer-master/src/Exception.php';

    /**
     * ? Für dieses Beispiel verzichten wir auf die Verifizierung der Daten, wie z.B. korrekte E-Mail-Synthax, Länge des Passwortes, verwendete Zeichen usw. 
     * */
    $u_name = $_POST['u_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adminAddress = 'webmaster@mail.org';
    
    // Texte für Mails im HTML- und Nur-Text-Format vorbereiten
    $mail_html  = "<h1>Hallo $u_name</h1>";
    $mail_html .= '<p>Schön, dass Du Dich bei uns registriert hast.</p>';
    $mail_html .= "<p>Du kannst Dich ab sofort mit deinem Benutzernamen <b>$u_name</b> und deinem gewählten Passwort bei uns anmelden.</p>";

    $mail_txt  = "Hallo $u_name\r\n\r\n";
    $mail_txt .= "Schön, dass Du Dich bei uns registriert hast.\r\n";
    $mail_txt .= "Du kannst Dich ab sofort mit deinem Benutzernamen $u_name und deinem gewählten Passwort bei uns anmelden.";

    //?$mail = new PHPMailer();
    //?$mail->From = $adminAddress;
    //?$mail->FromName = 'Webmaster';
    //?$mail->Subject = 'Registrierung erfolgreich';
//?
    //?$mail->Body = $mail_html;
    //?$mail->AltBody = $mail_txt;
//?
    //?$mail->addAddress($email);
    //?$mail->addReplyTo($adminAddress);
//?
    // SQL-Anweisung und Datenbank-Abfrage durchführen
    // ppi
      $sql = 'INSERT INTO `tbl_users`
      (
        `users_name`,`users_email`, `users_password`
      )
      VALUES
      (
        :un, :ue, :up
      )';
      echo '123' ;
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam( ':un', $u_name );
          $stmt->bindParam( ':ue', $email );

          // ! Passwort-Verschlüsselung durch die PHP-Funktion password_hash()

          $password_hash = password_hash( $password, PASSWORD_DEFAULT );
          $stmt->bindParam(':up', $password_hash);
    
          if( $stmt->execute() ) {
            echo '<p>Sie wurden erfolgreich registriert.</p>';
            echo '<p><a href="42-login.php">Weiter zum Login</a></p>';

            /* if( $mail->Send() ) {
              echo "<p>Ein E-Mail wurde an die Mail-Adresse <b>$email</b> versendet.</p>";
            } else {
              echo "<p>Leider konnte kein Mail an die Mail-Adresse <b>$email</b> versendet werden.</p>";
            }*/
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
      <input type="text" name="u_name" id="u_name">
    </p>

    <p>
      <label for="email">E-Mail-Adresse</label><br>
      <input type="email" name="email" id="email">
    </p>

    <p>
      <label for="password">Passwort</label><br>
      <input type="password" name="password" id="password">
    </p>

    <p>
      <input type="submit" value="registrieren">
    </p>
  </form>
</body>
</html>