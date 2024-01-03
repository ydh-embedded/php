<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Ostersonntag, Auswertung</title>
   <style>      table,td {border:1px solid black;}   </style>

</head>
<body>
<h2>Ostersonntag</h2>
<?php
   /* Einbinden der Datei mit der Funktion ostersonntag() */
   include "ostersonntag.inc.php";

   /* Hat der Benutzer die beiden Jahreszahlen in der falschen Reihenfolge eingegeben,
      werden sie getauscht. */

// Die Funktion intval() erzeugt aus den Strings, welche ein Formular liefert explizit den Datentyp Integer.

   $anfang = intval($_POST["anfang"]);
   $ende   = intval($_POST["ende"  ]);
   
   // ? Hier bitte den Code zum Tauschen der Jahreszahlen einfügen

   if ($anfang > $ende){
      $temp =
      $ende = $anfang ;
   } else if ($anfang==null){

   }

   
   // ? Und hier bitte den Code für die Tabelle einfügen

   $felder = array();
   $felder = array( $t , $m , $d );

   /* Für jedes Jahr gibt es einen Durchlauf einer for-Schleife,
      jeweils mit einem Aufruf der Funktion ostersonntag() */

      // ? Nutzen Sie als Variablen für die Datumswerte bitte die Bezeichner $jahr, $monat bzw. $tag.
   

      /* In den beiden Variablen $tag und $monat sind nach jedem Aufruf der Funktion ostersonntag()
         die Werte für den Tag und den Monat des betreffenden Jahres per Referenz gespeichert. */
      
?>
</body></html>
