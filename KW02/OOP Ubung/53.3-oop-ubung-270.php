<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include "53.4-oop-class.inc" ;
?>


<?php
    
    $meineBestellung = new Bestellung ( 583 , 
    
        array(
            new Bestellposten(  "Äpfel"   , 3  , 1.35 )  ,
            new Bestellposten(  "Banane"  , 5  , 0.85 )  ,
            new Bestellposten(  "Mango"   , 2  , 1.95 )  ,
            new Bestellposten(  "Kiwi"    , 20 , 0.50 )  ,
            new Bestellposten(  "Ananas"  , 1  , 3.95 )  ,
        )
    );
        echo $meineBestellung   ;
    
?>


</body>
</html>