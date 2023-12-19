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
        for($i=8 ; $i<=14 ; $i+=1){

            echo "<tr>" ;
            echo "<td> Zeile </td>" ;
            
            echo "<td style='text-align:right;'> $i  </td>";
            echo "<tr>" ;
            echo "<br>" ;

        }

    ?>
</body>
</html>