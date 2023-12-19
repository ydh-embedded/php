<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rechnen mit Zahlen</title>
</head>
<body>
  <?php
    
    $p1 = 22.5;
    $p2 = 12.3;
    $p3 = 5.2;
    const MWST = 0.19;

    $rb = ($p1 + $p2 + $p3) * (1 + MWST);

    echo $rb;
    
  ?>
</body>
</html>