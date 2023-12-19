<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>for-Schleifen</title>
</head>
<body>
  <?php 
  
  for($i = 13; $i <= 29; $i += 4) echo "$i ";
  echo '<br>';

  for($i = 2; $i >= -1; $i -= 0.5) echo "$i ";
  echo '<br>';

  for($i = 2000; $i <= 6000; $i += 1000) echo "$i ";
  echo '<br>';

  for($i = 5; $i <= 13; $i += 2) echo "Z$i ";
  echo '<br>';

  for($i = 1; $i <= 3; $i++) echo "a b$i ";
  echo '<br>';

  for($i = 0; $i <= 20; $i += 10) echo ' c' . ($i + 2) . ' c' . ($i + 3);
  echo '<br>';

  for($i = 13; $i <= 45; $i += 4) {
    if(($i > 21) && ($i < 33)) continue;
    echo "$i ";
  }
  ?>
</body>
</html>