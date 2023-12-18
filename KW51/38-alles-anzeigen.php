<?php
require_once 'includes/pdo-connect.inc.php';
require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datensatz auswählen</title>
  <style>table, th, td {border: 1px solid gray;}</style>
</head>
<body>
  <h1>Treffen Sie ihre Auswahl</h1>

  <form action="38-auswahl-anzeigen.php" method="post">

    <table>
      <tr>
        <th>Auswahl</th>
        <th>Name</th>
        <th>Vorname</th>
        <th>Pers-Nr</th>
        <th>Gehalt</th>
        <th>Geburtstag</th>
      </tr>

      <?php
        
      $sql = 'SELECT * FROM `tbl_personen`';
      
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->execute();
          if( $stmt->rowCount() === 0 ) {
            echo '<p>Keine Datensätze gefunden.</p>';
          } else {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<tr>';
              echo '<td><input type="radio" name="auswahl" value="' . $row['perso_nummer'] . '"></td>';
              echo '<td>' . $row['perso_name'] . '</td>';
              echo '<td>' . $row['perso_vorname'] . '</td>';
              echo '<td>' . $row['perso_nummer'] . '</td>';
              echo '<td>' . $row['perso_gehalt'] . '</td>';
              echo '<td>' . sql2germanDate($row['perso_geburtstag']) . '</td>';
              echo '</tr>';
            }
          }
        }
      $stmt = NULL;
      $pdo = NULL;
      } catch (PDOException $e) {
        echo 'ERROR:<br>' . $e->getMessage();
      }
        
      ?>
    </table>
    <p><input type="submit" value="Datensatz anzeigen"></p>
  </form>
</body>
</html>