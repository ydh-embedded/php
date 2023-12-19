<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verschachtelte for-Schleifen</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <table border="1">
    <?php
    for ($i = 1; $i <= 10; $i++) {
      echo '<tr>';
      for ($j = 1; $j <= 10; $j++) {
        echo '<td>' . ($i * $j) . '</td>';
      }
      echo '</tr>';
    }
    ?>
  </table>
</body>

</html>