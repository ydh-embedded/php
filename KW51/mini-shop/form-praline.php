<?php

session_start();
include 'artikel.inc.php';

?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pralinen - Bestellformular</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>Fallbeispiel "Shop": Formular 2 - Pralinen</h1>
  <p>Bestellung: Pralinen - tragen Sie die gewünschte Menge ein.</p>
  <form action="warenkorb.php" method="POST">
    <table>
      <tr>
        <th>Art.-
          Nr.</th>
        <th>Artikel</th>
        <th>Menge</th>
        <th>Einheit</th>
      </tr>
      <?php
      
      ?>
      <tr>
        <td colspan="4">
          <input type="submit" name="praline" value="In den Warenkorb">
          <input type="submit" name="abbruch" value="Abbrechen">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>