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
    
  if(!empty($_POST)) {
    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';

    /* Für dieses Beispiel verzichten wir auf die Verifizierung der Daten, wie z.B. korrekte E-Mail-Synthax, Länge des Passwortes, verwendete Zeichen usw. */

    
    // Texte für Mails im HTML- und Nur-Text-Format vorbereiten
    $mail_html  = "<h1>Hallo $u_name</h1>";
    $mail_html .= '<p>Schön, dass Du Dich bei uns registriert hast.</p>';
    $mail_html .= "<p>Du kannst Dich ab sofort mit deinem Benutzernamen <b>$u_name</b> und deinem gewählten Passwort bei uns anmelden.</p>";

    $mail_txt  = "Hallo $u_name\r\n\r\n";
    $mail_txt .= "Schön, dass Du Dich bei uns registriert hast.\r\n";
    $mail_txt .= "Du kannst Dich ab sofort mit deinem Benutzernamen $u_name und deinem gewählten Passwort bei uns anmelden.";

    $mail = new PHPMailer();
    $mail->From = $adminAddress;
    $mail->FromName = 'Webmaster';
    $mail->Subject = 'Registrierung erfolgreich';

    $mail->Body = $mail_html;
    $mail->AltBody = $mail_txt;

    $mail->addAddress($email);
    $mail->addReplyTo($adminAddress);

    // SQL-Anweisung und Datenbank-Abfrage durchführen
    
    
  }
    
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