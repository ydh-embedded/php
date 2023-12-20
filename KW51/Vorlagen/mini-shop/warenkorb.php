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

  

  ?>

  <table>
    <tr>
      <th>Art.-Nr.</th>
      <th>Artikel</th>
      <th>Menge</th>
    </tr>

    <?php
      
    
      
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