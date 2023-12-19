<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verschachtelte for-Schleifen</title>
</head>
<body>
  <?php
    
    for( $i = 1; $i <= 10; $i++) {
      for( $j = 1; $j <= 10; $j++) {
        echo ($i * $j) . ' ';
      }
      echo '<br>';
    }
    
  ?>
</body>
</html>