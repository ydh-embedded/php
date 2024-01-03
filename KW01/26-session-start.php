<?php  session_start(); ?>
</p>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Start einer Session</title>
</head>
<body>
  <h1>Start einer Session</h1>
  <p>Die Session wurde gestartet.</p>
  <p>Session-ID: <?=session_id(); ?><br>
    Name der Session: <?=session_name(); ?>
  </p>

  <p>Weiter zur <a href="27-session-formular.php">folgenden Seite</a>.</p>
</body>
</html>