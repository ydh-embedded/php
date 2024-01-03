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

  if( ! empty($_POST)) {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $ort = $_POST['ort'];
  
  ?>
    <p>Sie haben folgende Bestellung übermittelt:</p>

    <p><?= $vorname ?? ''; ?> <?= $nachname ?? ''; ?> aus <?= $ort ?? ''; ?></p>

    <table>
      <tr>
        <th>Art.-Nr.</th>
        <th>Artikel</th>
        <th>Menge</th>
      </tr>

      <?php
      // Überschriften für die CSV-Datei
      $bestellung = "Art.-Nr.;Artikel;Menge\r\n";

      foreach( $_SESSION as $key => $value ) {
        if(  substr($key, 0, 1) === 's') {
          echo '<tr>';
            echo "<td>$key</td>";
            echo '<td>' . $array_schoko[$key] . '</td>';
            echo "<td>$value</td>";
          echo '</tr>';

          // Kategorie Schoko für die CSV-Datei
          $bestellung .= "$key;" . $array_schoko[$key] . ";$value\r\n";
        }
        if(  substr($key, 0, 1) === 'p') {
          echo '<tr>';
            echo "<td>$key</td>";
            echo '<td>' . $array_praline[$key] . '</td>';
            echo "<td>$value</td>";
          echo '</tr>';

          // Kategorie Pralinen für die CSV-Datei
          $bestellung .= "$key;" . $array_praline[$key] . ";$value\r\n";
        }
      }

      // Bestell-Informationen für die CSV-Datei
      $bestellung .= "\r\nbestellt von\r\n$vorname;$nachname;$ort\r\n\r\n";
      ?>

    </table>

    <p>Vielen Dank! Ihr Einkauf ist beendet.</p>

  <?php

    // CSV-Datei erzeugen
    file_put_contents('bestellung.csv', $bestellung, FILE_APPEND);

    // Session zerstören
    $_SESSION = array();
    session_destroy();
  } else {

  ?>

  <p>Bitte füllen Sie die nachfolgenden Eingabefelder aus:</p>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <p>Vorname: <input type="text" name="vorname"></p>
    <p>Nachname: <input type="text" name="nachname"></p>
    <p>Wohnort: <input type="text" name="ort"></p>
    <p><input type="submit" name="absenden" value="Absenden und Bestellung abschließen"></p>
  </form>

  <?php } ?>
</body>

</html>