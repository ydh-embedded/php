<?php
  
  session_start();
  include 'artikel.inc.php';
  
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ihr Warenkorb</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <h1>Ihr Warenkorb</h1>
  <?php

  if( isset($_POST['honey']) ) {

    foreach($_POST as $artikelnummer => $value) {

      if( ! is_numeric( $value ) ) {
        continue;
      }

      if( $value >=1 ) {
        $_SESSION[$artikelnummer] = intval($value);
      } else {
        if( isset( $_SESSION[$artikelnummer] ) ) {
          unset( $_SESSION[$artikelnummer] );
        }
      }
    }
  }

  ?>

  <table>
    <tr>
      <th>Art.-Nr.</th>
      <th>Artikel</th>
      <th>Menge</th>
    </tr>

    <?php
      
    foreach( $_SESSION as $artikelnummer => $value ) {
      if(  substr($artikelnummer, 0, 1) === 'H') {
        echo '<tr>';
          echo "<td>$artikelnummer</td>";
          echo '<td>' . $array_honig[$artikelnummer] . '</td>';
          echo "<td>$value</td>";
        echo '</tr>';
      }
    }
      
    ?>

  </table>

  <p>Was möchten Sie tun?</p>

  <ul>
        <li>
          <a href="form-honig.php">Honig bestellen</a>
        </li>

        <li>
          <a href="kasse.php">Bestellung abschließen</a>
        </li>
  </ul>

</body>

</html>