<?php

session_start();
include 'artikel.inc.php';

?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasse</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>Bestellung abschließen</h1>
  <?php

  
  ?>
    <p>Sie haben folgende Bestellung übermittelt:</p>

    <p></p>

    <table>
      <tr>
        <th>Art.-Nr.</th>
        <th>Artikel</th>
        <th>Menge</th>
      </tr>

      <?php
      
      ?>

    </table>

    <p>Vielen Dank! Ihr Einkauf ist beendet.</p>

  <?php

    

  ?>

  <p>Bitte füllen Sie die nachfolgenden Eingabefelder aus:</p>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <p>Vorname: <input type="text" name="vorname"></p>
    <p>Nachname: <input type="text" name="nachname"></p>
    <p>Wohnort: <input type="text" name="ort"></p>
    <p><input type="submit" name="absenden" value="Absenden und Bestellung abschließen"></p>
  </form>

  <?php  ?>
</body>

</html>