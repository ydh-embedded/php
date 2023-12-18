<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular: Auswertung in der selben Datei</title>
</head>
<body>
  <h1>Formular: Auswertung in der selben Datei</h1>

  <?php

  echo '<pre>', var_dump( $_POST ), '</pre>';

  
    
  if( ! empty($_POST) ) {
    $anrede = $_POST['anrede'];
    $uname = $_POST['uname'];
    $kurs = $_POST['kurs'] ?? array();
    $status = $_POST['status'];
    $msg = nl2br($_POST['msg'], false);

  }
    
  ?>

  <form action="" method="post">

    <p style="color: #a00;"></p>

    <p>Mit * gekennzeichnete Elemente müssen ausgewählt werden!</p>

    <p>
      <label>
        <input type="radio" name="anrede" value="m">
        Herr
      </label>
      <label>
        <input type="radio" name="anrede" value="f">
        Frau
      </label>
      <label>
        <input type="radio" name="anrede" value="d">
        Divers
      </label>
    </p>

    <p>
      <label for="uname">Vollständiger Name *:</label>
      <input type="text" name="uname" id="uname">
    </p>

    <p>Welche Kurse möchten Sie belegen? *
      <label>
        <input type="checkbox" name="kurs[]" value="html">
        HTML / CSS
      </label>
      <label>
        <input type="checkbox" name="kurs[]" value="php">
        PHP
      </label>
      <label>
        <input type="checkbox" name="kurs[]" value="js">
        JavaScript
      </label>
    </p>

    <p>
      <label for="status">Welchen Status haben Sie? *</label>
      <select name="status" id="Status">
        <option>-- Bitte auswählen --</option>
        <option>Anfänger</option>
        <option>Fortgeschrittener</option>
        <option>Profi</option>
      </select>
    </p>

    <p>
      <label for="msg">Ihre Nachricht</label>
      <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
    </p>

    <p>
      <input type="submit">
      <input type="reset">
    </p>

  </form>

</body>
</html>