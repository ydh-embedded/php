<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
//  TODO: wir verschachteln eine for - Schleife
    <?php
        echo "<br> Verschachtelte For Schleife Variante 1 <space><br>" ;
        for($zeile=1 ; $zeile<=5 ; $zeile+=1){
            for($s=1 ; $s<=3 ; $s= $s+1 ){
                echo " Zeile $zeile / Spalte $s <space>" ;
            }
            echo "<br>" ;
        }
    ?>
</body>
</html>