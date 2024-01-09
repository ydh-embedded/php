<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung OOP mit class 2D</title>
</head>

<body>
    
<?php
//  include_once "53.2-oop-punkt.inc.php" ;
    include_once "53.2-oop-punkt.inc.php" ;

    $punkt_1 = new ZweiD (     0 , 0      )      ;
    $punkt_2 = new ZweiD (   3.2 , 5.8    )      ;
    $punkt_3 = new ZweiD (   4.0 , 0.0    )      ;
    $punkt_4 = new ZweiD (  x: 0 , y: 1.5 )      ;
    echo '<pre>';
    var_dump( $punkt_1 )    ;
    var_dump( $punkt_2 )    ;
    var_dump( $punkt_3 )    ;
    var_dump( $punkt_4 )    ;
    echo '</pre>';
    ?>


<?php
//  include_once "53.2-oop-punkt.inc.php" ;
include_once "53.2-oop-punkt.inc.php" ;

$punkt_1 = new Punkt (     0 , 0      )      ;
$punkt_2 = new Punkt (   3.2 , 5.8    )      ;
$punkt_3 = new Punkt (   4.0 , 0.0    )      ;
$punkt_4 = new Punkt (  x: 0 , y: 1.5 )      ;
echo '<pre>';
var_dump( $punkt_1 )    ;
var_dump( $punkt_2 )    ;
var_dump( $punkt_3 )    ;
var_dump( $punkt_4 )    ;
echo '</pre>';
?>



</body>
</html>