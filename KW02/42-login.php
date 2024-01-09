<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <?php
    
  if( !empty($_POST)) {
    $u_name = $_POST['u_name'];
    $password = $_POST['password'];

    define('DB_NAME', 'shop');
    require_once 'includes/pdo-connect.inc.php';
    require_once 'includes/functions.inc.php';

    $sql = 'SELECT `users_name`, `users_password` FROM `tbl_users`
    WHERE `users_name`= :un';
    
    try {
      if( $stmt = $pdo->prepare($sql) ) {
        $stmt->bindParam( ':un', $u_name );
        $stmt->execute();
        // Prüfung ob Nutzername existiert
        if( $stmt->rowCount() === 0 ) {
          echo '<p>Nutzername oder Passwort stimmen nicht überein!</p>';
        } else {
          $row = $stmt->fetch(PDO::FETCH_OBJ);

          //  ! Verifizierung des Passwortes durch die Funktion password_verify()

          if( password_verify( $password, $row->users_password ) ) {
            // Nutzer hat sich korrekt eingeloggt
            // Der NUtzername und diese Information wird im SESSION-Cookie gespeichert
            $_SESSION['users_name'] = $u_name;
            $_SESSION['is_logged_in'] = true;

            echo '<p>Korrekt eingeloggt.</p>';
            echo '<p><a href="44-sichere-seite.php">sichere Seite</a></p>';
          } else {
            echo '<p>Nutzername oder Passwort stimmen nicht überein!</p>';
          }
        }
      }
    } catch (PDOException $e) {
      echo get_db_error($pdo, $sql, $e);
    }
    $stmt = NULL;
    $pdo = NULL;
  }
    
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
      <label for="u_name">Benutzername</label><br>
      <input type="text" name="u_name" id="u_name">
    </p>

    <p>
      <label for="password">Passwort</label><br>
      <input type="password" name="password" id="password">
    </p>

    <p>
      <input type="submit" value="login">
    </p>
  </form>
</body>
</html>