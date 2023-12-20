<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_for_Schleife</title>
</head>

<body>
    <?php
        echo "For Schleife Variante 1 <space>" ;
        for($i=13 ; $i<30 ; $i+=4){
            echo " $i <space>" ;
        }
    ?>
//  NOTE: Wir erstellen eine for Schleife
    <?php
        echo "<br> For Schleife Variante 2 <space>" ;
        for($i=2 ; $i>-1 ; $i-=0.5){
            echo " $i <space>" ;
        }
    ?>


</body>
</html>