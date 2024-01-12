<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Login</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>
<body>
<header><h1>Der Tec-Blog</h1><h2>Themen-Übersicht</h2></header>

<div class="container">
  <div class="block">
    <div class="login-class">


<?php
        require_once 'includes/init.inc.php';

  if( !empty($_POST)) {
    $u_name   = $_POST['u_name'];
    $password = $_POST['password'];


    $sql = 'SELECT `users_lastname`, `users_password` FROM `tbl_users`  WHERE `users_lastname`= :un';
    
    try {
      if( $stmt = $pdo->prepare($sql) ) {
        $stmt->bindParam( ':un', $u_name );
        $stmt->execute();
        
        if( $stmt->rowCount() === 0 ) {                                         // Prüfung ob Nutzername existiert
          echo '<p>Nutzername oder Passwort stimmen nicht überein!</p>';
        } else {

          $row = $stmt->fetch(PDO::FETCH_OBJ);


          if( password_verify( $password, $row->users_password ) ) {            // Verifizierung des Passwortes durch die Funktion password_verify()

            $_SESSION['users_lastname']   = $u_name;                              // Nutzer hat sich korrekt eingeloggt
            $_SESSION['is_logged_in']     =    true;                                   // Der NUtzername und diese Information wird im SESSION-Cookie gespeichert
                                                                                // Der NUtzername und diese Information wird im SESSION-Cookie gespeichert

            echo '<p>Korrekt eingeloggt, weiter zum </p>';
            echo '<p><a href="07-artikel-anlegen.php">Artikel</a></p>';

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


  </div>
</div>
</div>


<footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>
</html>