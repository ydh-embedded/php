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

    $sql = '';
    
    try {
      //
    } catch (PDOException $e) {
      echo 'ERROR:<br>' . $e->getMessage();
    }
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