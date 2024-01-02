<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Kopfrechnen, Aufgaben</title>
   <!-- Mithilfe der CSS-Style-Angabe padding-right wird der Abstand
        zwischen dem Inhalt und dem rechten Rand von Tabellenzellen eingestellt.
        Damit wird die Darstellung übersichtlicher. -->
   <style>
      td {padding-right:20px;}
   </style>
</head>
<body>
<?php
echo "<p><b>Kopfrechnen</b></p>";

/* Wird kein Spielername eingegeben, wird das Dokument ordnungsgemäß vervollständigt
   und das PHP-Programm mithilfe von exit unmittelbar beendet. */
$spielername = htmlentities($_POST["spielername"]);
if($spielername == "")
{
   echo "<p>Kein Name, kein Spiel</p>";
   echo "<a href='kopf.html'>Zum Start</a>";
   echo "</body>";
   echo "</html>";
   exit;
}

/* Der Spieler wird mit seinem Namen begrüßt.
   Zusätzlich wird sein Name in einem versteckten Formularelement an das nächste Programm weitergegeben. */
echo "<form action='kopf_b.php' method='post'>";
echo "<p>Hallo <b>$spielername</b>, Ihre Aufgaben</p>";
echo "<input name='spielername' type='hidden' value='$spielername'>";

/* Beginn der Tabelle */
echo "<table>";

/* Schleife für fünf Aufgaben */
for($i=0; $i<5; $i++)
{
   /* Zufällige Auswahl des Operators */
   $opzahl = random_int(1,5);

   /* Zufällige Auswahl der beiden Operanden. Die Bereiche für die Zufallszahlen sind abhängig vom Operator.
      Zum Beispiel können für eine Additionsaufgabe größere Zahlen erscheinen als für eine Multiplikationsaufgabe. */
   switch($opzahl)
   {
      case 1:
         $a = random_int(-10,30);
         $b = random_int(-10,30);
         $op = "+";
         $c = $a + $b;
         break;
      case 2:
         $a = random_int(1,30);
         $b = random_int(1,30);
         $op = "-";
         $c = $a - $b;
         break;
      case 3:
         $a = random_int(1,10);
         $b = random_int(1,10);
         $op = "*";
         $c = $a * $b;
         break;

      /* Die Division ist ein Sonderfall. Das Ergebnis soll ganzzahlig sein. Daher wird zunächst eine Multiplikation durchgeführt.
         Anschließend werden das Ergebnis und ein Operand miteinander getauscht, sodass sich eine Division ohne Rest ergibt. */
      case 4:
         $c = random_int(1,10);
         $b = random_int(1,10);
         $op = "/";
         $a = $c * $b;
         break;
      case 5:
         $a = random_int(1,30);
         $b = random_int(1,30);
         $op = "%";
         $c = $a % $b;
         break;
   }

   /* Die Aufgabe wird zusammen mit einer laufenden Nummer
      und einem Eingabefeld für die Lösung ausgegeben. */
   echo "<tr>";
   echo "<td>" . ($i+1) . ":</td>";
   echo "<td> $a $op $b = </td>";
   echo "<td><input name='ein[$i]' size='12'></td>";
   echo "</tr>";

   /* Das richtige Ergebnis wird in einem versteckten Formularelement an das nächste Programm weitergegeben. */
   echo "<input name='erg[$i]' type='hidden' value='$c'>";
}


   
/* Da es sich um mehrere, gleichartig aufgebaute Vorgänge handelt, werden Felder von Formularelementen benutzt:
   eines für die Eingaben des Benutzers und eines für die richtigen Ergebnisse.
   So haben Sie die Möglichkeit, sowohl die Ermittlung und Ausgabe der Aufgaben
   als auch die Ermittlung der Anzahl der richtigen Eingaben mithilfe einer Schleife durchzuführen. */
?>
</table>
<p><input type="submit" value="Fertig"></p>
</form>
</body>
</html>
