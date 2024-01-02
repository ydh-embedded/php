<!DOCTYPE html>
<html lang='de'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Multibyte String-Funktionen</title>
</head>

<body>
  <h1>Multibyte Zeichenketten-Funktionen</h1>
  <h2>Position</h2>
  <?php
  $tx = '<p>Sage nicht alles was du weißt, aber wisse immer was du sagst!';
  echo '$tx</p>';

  echo '<p>Positionen:<br>';
  echo 'S ab Anfang: '        . mb_strpos($tx, 'S') . '<br>';
  echo 'S oder s ab Anfang: ' . mb_stripos($tx, 'S') . '<br>';
  echo 's ab Ende: '          . mb_strrpos($tx, 's') . '<br>';
  echo 'S oder s ab Ende: '   . mb_strripos($tx, 's') . '<br>';

  echo 'Alle S oder s ab Anfang: ';
  $pos = -1;
  while ($pos = mb_stripos($tx, 'S', $pos + 1))
    echo "$pos ";
  echo '</p>';

  echo '<p>Teilzeichenketten:<br>';
  echo 'Ab 4 bis Ende: '    . mb_substr($tx, 4) . '<br>';
  echo 'Ab 4, 2 Zeichen: '  . mb_substr($tx, 4, 2) . '<br>';
  echo 'Ab -4 bis Ende: '   . mb_substr($tx, -4) . '<br>';
  echo 'Ab -4, 2 Zeichen: ' . mb_substr($tx, -4, 2) . '</p>';
  ?>

  <h2>Eigenschaften, Manipulation, Codes</h2>
  <?php
  echo '<p>';
  $tx = 'Wäre Jörg ein großer Sänger, würde er schöne Lieder singen';
  echo $tx . '</p>';

  echo '<p>Anzahl Zeichen: ' . mb_strlen($tx) . '<br>';
  echo mb_strtolower($tx) . '<br>';
  echo mb_strtoupper($tx) . '</p>';

  $ar = mb_str_split($tx);
  for ($i = 0; $i < count($ar); $i++)
    echo $ar[$i] . '|';
  echo '<br>';
  for ($i = 0; $i < count($ar); $i++)
    echo mb_ord($ar[$i]) . ' ';
  echo '<br>';

  for ($i = 32; $i <= 64; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';

  for ($i = 65; $i <= 90; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';

  for ($i = 97; $i <= 122; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';

  for ($i = 224; $i <= 252; $i++)
    echo mb_chr($i) . ' ';
  echo '</p>';
  ?>

  <h2>Suchen und Ersetzen mit regulären Ausdrücken</h2>
  <?php
  echo '<p>';
  $tx = 'Forscherdrang und gleichzeitig das Böse im Menschen erreichen den Climax, wenn sich die Mitte des gezerrten Bärchens von Millionen Mikrorissen weiß färbt und gleich darauf das zweigeteilte Stück auf die Finger zurückschnappt.  Man hat ein Gefühl der Macht über das hilflose, nette Gummibärchen.';
  echo $tx . '</p><p>';

  mb_ereg_search_init($tx, 'das');
  if (mb_ereg_search())  echo 'Gefunden: das<br>';

  $i = 1;
  mb_ereg_search_init($tx, 'as');
  while (mb_ereg_search())
    echo 'Fund ' . $i++ . ': as<br>';

  mb_ereg_search_init($tx, '^sich');
  if (mb_ereg_search())  echo 'Beginnt mit: ist<br>';
  else                  echo 'Beginnt nicht mit: sich<br>';

  mb_ereg_search_init($tx, 'sich$');
  if (mb_ereg_search())  echo 'Endet mit: sich<br>';
  else                  echo 'Endet nicht mit: sich<br>';

  mb_ereg_search_init($tx, 'Gummibärchen$');
  if (mb_ereg_search())  echo 'Endet mit: Gummibärchen<br>';
  else                  echo 'Endet nicht mit: Gummibärchen<br>';

  echo mb_ereg_replace('das', 'xyz', $tx) . '<br>';
  echo mb_eregi_replace('das', 'abc', $tx) . '</p>';
  ?>

  <h2>Zeichenketten und Arrays</h2>
  <?php
  echo '<p>';
  $tx = 'Maier;Hans;6714;3500;1962-03-15';
  $feld = mb_split(';', $tx);
  for ($i = 0; $i < count($feld); $i++)
    echo $feld[$i] . '<br>';
  echo '</p><p>';

  echo implode(';', $feld), '</p>';
  ?>
</body>

</html>