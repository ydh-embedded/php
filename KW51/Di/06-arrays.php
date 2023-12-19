<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arrays oder Feldvariablen</title>
</head>

<body>
  <h1>Arrays</h1>
  <h2>indizierte Arrays</h2>

  <?php

  /* indiziertes Array erzeugen */
  $staedte = array(
    'Leipzig',
    'Nordhausen',
    'Erfurt'
  );

  /* Zugriff auf indizierte Arrays */
  echo '<p>' . $staedte[1] . '</p>';

  /* Array erweitern */
  $staedte[] = 'Marburg';

  array_push($staedte, 'Jena');


  /* Arrays in der Entwicklungsphase ausgeben */
  echo '<pre>', var_dump($staedte), '</pre>';

  sort($staedte);

  echo '<pre>', print_r($staedte, true), '</pre>';

  /* Werte löschen */

  unset($staedte[3]);

  echo '<pre>', var_dump($staedte), '</pre>';
  ?>

  <h2>assoziative Arrays</h2>

  <?php

  $hauptstaedte = array(
    'Schweiz' => 'Bern',
    'Frankreich' => 'Paris',
    'Deuschland' => 'Berlin'
  );

  echo '<pre>', print_r($hauptstaedte, true), '</pre>';

  /* Zugriff */
  echo '<p>' . $hauptstaedte['Frankreich'] . '</p>';

  /* Hinzufügen */
  $hauptstaedte['Spanien'] = 'Madrid';

  echo '<pre>', print_r($hauptstaedte, true), '</pre>';

  ?>

  <h2>Kurzschreibweisen</h2>

  <?php

  $namen = ['Frank', 'Dennis', 'Marie'];
  $benutzer = ['bname' => 'franky', 'bpw' => 'geheim'];

  /* Ausgabe für die produktive Version */
  echo '<p>';
  foreach ($staedte as $stadt) {
    echo "$stadt<br>";
  }
  echo '</p>';

  echo '<p>';
  foreach ($hauptstaedte as $land => $hauptstadt) {
    echo "Die Hauptstadt von $land ist $hauptstadt.<br>";
  }
  echo '</p>';

  /* Überprüfung ob eine Variable existiert (isset) und ob sie iterierbar ist (is_iterable) */
  if (isset($staedte) && is_iterable($staedte)) {
    echo '<p>';
    foreach ($staedte as $stadt) {
      echo "$stadt<br>";
    }
    echo '</p>';
  }

  ?>

  <h2>mehrdimensionale Arrays</h2>

  <h3>mehrdimensionale indizierte Arrays</h3>

  <?php

  $personen = array(
    array(
      'Oliver',
      'spanisch',
      37
    ),
    array(
      'Maria',
      'deutsch',
      23
    ),
    array(
      'David',
      'englisch',
      46
    )
  );

  /* Zugriff */
  echo '<p>' . $personen[1][0] . ' ist ' . $personen[1][2] . ' Jahre alt und spricht ' . $personen[1][1] . '.</p>';

  /* Hinzufügen */
  $personen[3][0] = 'Johanna';
  $personen[3][1] = 'schwedisch';
  $personen[3][2] = 19;

  $personen[] = array('Janek', 'polnisch', 34);

  echo '<pre>', print_r($personen, true), '</pre>';

  ?>

  <h3>mehrdimensionales assoziatives Array</h3>

  <?php

  $laender = array(
    'Spananien' => array(
      'Hauptstadt' => 'Madrid',
      'Sprache' => 'spanisch',
      'Waehrung' => 'Euro',
      'Flaeche' => 504645
    ),
    'England' => array(
      'Hauptstadt' => 'London',
      'Sprache' => 'englisch',
      'Waehrung' => 'Pfund Sterling',
      'Flaeche' => 130395
    ),
    'Portugal' => array(
      'Hauptstadt' => 'Lissabon',
      'Sprache' => 'portugiesisch',
      'Waehrung' => 'Euro',
      'Flaeche' => 92345
    )
  );

  /* Ausgabe für produktive Version */
  echo '<p>';
  foreach ($personen as $person) {
    // Inhalt des äußeres Array
    list($name, $sprache, $alter) = $person;
    echo "$name ist $alter Jahre alt und spricht $sprache.<br>";
  }
  echo '</p>';

  ?>

  <table border="1">
    <tr>
      <th>Land</th>
      <th>Hauptstadt</th>
      <th>Sprache</th>
      <th>Währung</th>
      <th>Fläche in km²</th>
    </tr>

    <?php foreach ($laender as $land => $infos) : ?>
      <!-- äußere Schleife für die Zeilen -->
      <tr>
        <td><?= $land; ?></td>

        <?php foreach ($infos as $info) : ?>
          <td><?= $info; ?></td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>