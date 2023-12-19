<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zeichenketten</title>
</head>
<body>
<?php
    
    $p1 = 22.5;
    $p2 = 12.3;
    $p3 = 5.2;
    const MWST = 0.19;

    $zs = $p1 + $p2 + $p3;
    $rb = $zs * (1 + MWST);

    echo "<p>Artikel 1: $p1 €<br>";
    echo "Artikel 2: $p2 €<br>";
    echo "Artikel 3: $p3 €</p>";

    echo "<p>Nettosumme: $zs €<br>";
    echo 'Umsatzsteuer: ' . (MWST * 100) . ' %<br>';
    echo "Bruttosumme: $rb €</p>";
    
  ?>
</body>
</html>