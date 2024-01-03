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

  if( isset($_POST['schoko']) || isset($_POST['praline']) ) {
    foreach($_POST as $key => $value) {
      if( ! is_numeric( $value ) ) {
        continue;
      }
      if( $value >=1 ) {
        $_SESSION[$key] = intval($value);
      } else {
        if( isset( $_SESSION[$key] ) ) {
          unset( $_SESSION[$key] );
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
      
    foreach( $_SESSION as $key => $value ) {
      if(  substr($key, 0, 1) === 's') {
        echo '<tr>';
          echo "<td>$key</td>";
          echo '<td>' . $array_schoko[$key] . '</td>';
          echo "<td>$value</td>";
        echo '</tr>';
      }
      if(  substr($key, 0, 1) === 'p') {
        echo '<tr>';
          echo "<td>$key</td>";
          echo '<td>' . $array_praline[$key] . '</td>';
          echo "<td>$value</td>";
        echo '</tr>';
      }
    }
      
    ?>

  </table>

  <p>Was möchten Sie tun?</p>
  <ul>
    <li>
      <a href="form-schoko.php">Schokolade bestellen</a>
    </li>
    <li>
      <a href="form-praline.php">Pralinen bestellen</a>
    </li>
    <li>
      <a href="kasse.php">Bestellung abschließen</a>
    </li>
  </ul>
</body>

</html>