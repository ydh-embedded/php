<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datei / Verzeichnis</title>
</head>

<body>
  <p>
    <?php
    $dir = __DIR__;

    if ($dh = opendir($dir)) {
      while ($oName = readdir($dh)) {
        // wenn Objekt keine Datei ist...
        if (! is_file($oName)) {
          // ... neuer Schleifendurchlauf
          continue;
        }
        // Prüfe die Mime-Types auf html, php, css und txt (funktioniert nicht sicher)...
        if ((mime_content_type($oName) == 'text/html') || (mime_content_type($oName) == 'text/css') || (mime_content_type($oName) == 'text/plain')) {
          // ... und gib sie als Link aus
          echo "<a href=\"$oName\">$oName</a><br>";
        } else {
          // ... andernfalls neuer Schleifendurchlauf
          continue;
        }
      }
      closedir($dh);
    } else {
      echo '<p>Verzeichnis konnte nicht geöffnet werden.</p>';
    }
    ?>
  </p>
</body>

</html>