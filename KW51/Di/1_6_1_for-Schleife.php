<!DOCTYPE html>
//region meta
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
//endregion
//region body
<body>
    <?php

        for($i=-1; $i<=5 ; $i++){
            echo "Zeile $i<br>" ;
        };

        for($i=10 ; $i<=15 ; $i++){
            echo "For Schleife  $i <br>" ;
        }

        for($i=10 ; $i<15 ; $i++){
            echo "For Schleife  $i <br>" ;
        }
        
    ?>
#region Head-Controlled <br>

<?php
    for($i=10 ; $i >= 5 ; $i--){
        var_dump($i) ;
        echo "Variante 1 <br> $i <bl>" ;
    }
    ?>

<?php
    for($i=10 ; $i > 5 ; $i--){
        var_dump($i) ;
        echo "Variante 2 <br> $i <br>" ;
    }
    
    ?>

<?php
    for($i=3 ; $i <=22 ; $i+=3){
        var_dump($i) ;
        echo "Variante 3 <br> $i <br>" ;
    }
    ?>

<?php
    for($i=32 ; $i >12 ; $i-=4){
        var_dump($i) ;
        echo "Variante 4 <br> $i <br>" ;
    }
    ?>

<?php
    for($i=12.0 ; $i <12.9 ; $i+=0.2){
        var_dump($i) ;
        echo "Variante 5 <br> $i <br>" ;
    }
?>
#endregion
















</body>
//endregion













</html>