<?php

//region function ostersonntag



   function ostersonntag($j, &$t, &$m){
/* Berechnung von d = Tag */

   $d = ((15 + intdiv($j, 100) - intdiv($j, 400) - intdiv((8 * intdiv($j, 100) + 13) , 25)) % 30 + 19 * ($j % 19)) % 30;

/* Berechnung von D */

   if($d==29)                         $D = 28   ;
     else if($d == 28 && $j%17 >= 11) $D = 27   ;
   else                               $D = $d   ;

/* Berechnung von e */

   $e = (2 * ($j%4) + 4 * ($j%7) + 6 * $D + (6 + intdiv($j, 100) - intdiv($j, 400) - 2) % 7) % 7;

/* Berechnung von Tag und Monat, Rückgabe der Werte per Referenz */

   $m = "03";
   $t = 21 + $e + $D + 1;

   if($t > 31){

      $m = "04";
      $t = $t - 31;

   }

   if($t < 10){

      $t = "0" . $t;

   }

}//function ostersonntag
//endregion

?>
