<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Übung (Kapitel 8) Auswertung</title>
</head>

<body>
  <h1>Umfrage Auswertung</h1>

  <?php

  $uname = $_POST['uname'];
  $strasse = $_POST['strasse'];
  $ort = $_POST['ort'];
  $inet = $_POST['inet'];
  $info = $_POST['info'];
  $bestell = $_POST['bestell'];
  $nachricht = $_POST['nachricht'];

  $daten = 'umfrage_daten.csv';

  if(! file_exists($daten)) {
    $header = array('Name', 'Anschrift', 'PLZ Ort', 'Internet-Auftritt', 'Informationen', 'Bestellsystem', 'Bemerkung' );
  }
  
  $felder = array($uname, $strasse, $ort, $inet, $info, $bestell, $nachricht);

  $fh = fopen($daten, 'a');

  // Datei-Header für korrektes UTF8
  fprintf($fh, chr(0xEF).chr(0xBB).chr(0xBF));

  if(isset($header)) {
    if(! $h = fputcsv($fh, $header, ';')) {
      die('<p>Hilfe! Ein Fehler ist aufgetreten. Keine Ahnung wie es jetzt weitergehen soll!</p>');
    }
  }

  if ($f = fputcsv($fh, $felder, ';')) {
    echo "<p>Vielen Dank für Ihre Teilnahme. Ihre Daten wurden gespeichert.</p>";
  } else {
    echo '<p>Fehler beim Speichern der Daten.</p>';
  }

  fclose($fh);

  ?>
</body>

</html>