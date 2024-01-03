<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datumsfunktionen</title>
</head>

<body>
<h2>Aufgabe 1.0<br><code>date('l') </code></h2>
<?php

    $heute  = date('l') ;
    var_dump($heute) ;

?>

<h2>case Anweisung<br><code>switch ($i) {} </code></h2>

<p></p>

<?php

    $i      = $heute ;


    switch ($i) {
      case 'Monday':
          echo "Ja - Heute ist Montag !";
          break;
      case 'Tuesday':
          echo "Ja - Heute ist Dienstag !";
          break;
      case 'Wednesday':
          echo "Ja - Heute ist Mittwoch !";
          break;
      case 'Thursday':
          echo "Ja - Heute ist Donnerstag !";
          break;
      case 'Friday':
          echo "Ja - Heute ist Freitag !";
          break;
      case 'Saturday':
          echo "Ja - Heute ist Samstag !";
          break;
      case 'Sunday':
          echo "Ja - Heute ist Sonntag !";
          break;
  }
?>

</body>
</html>