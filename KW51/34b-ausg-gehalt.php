<?php require_once 'includes/pdo-connect.inc.php'; ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auswahl-Filtern</title>
</head>

<body>
  <?php
  echo '<pre>', var_dump($_POST), '</pre>';

  $sql = "SELECT `perso_name`, `perso_gehalt` FROM `tbl_personen`";

  

  ?>
</body>

</html>