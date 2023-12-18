<?php
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daten eingeben</title>
</head>

<body>
  <?php

  if (!empty($_POST)) {
    $sql = 'INSERT INTO `tbl_personen`
    (
      `perso_name`,
      `perso_vorname`,
      `perso_nummer`,
      `perso_gehalt`,
      `perso_geburtstag`
    )
    VALUES
    (
      :na,
      :vn,
      :pn,
      :ge,
      :gt
    )';

    $gebdat = german2sqlDate($_POST['gt']);
    
    
  }


  ?>
  <p>Geben Sie bitte einen Datensatz ein und senden Sie das Formular ab.</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><input type="text" name="na"> Name</p>
    <p><input type="text" name="vn"> Vorname</p>
    <p><input type="text" name="pn"> Personalnummer</p>
    <p><input type="text" name="ge"> Gehalt</p>
    <p><input type="text" name="gt"> Geburtsdatum (T.M.JJJJ)</p>
    <p><input type="submit" value="Daten speichern"></p>
  </form>
</body>

</html>