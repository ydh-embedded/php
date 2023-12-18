# Typen Verwaltung

.

## Wir verwenden die if Methode

.

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Typ-Überprüfung</title>
    </head>
    <body>
    <?

        if(is_int(42))          echo "42   ist eine Ganzzahl<br>"           ;
        if(!is_int(42.0))       echo "42.0 ist keine Ganzzahl<br>"          ;

        if(!is_float(42.0))     echo "42.0 ist eine Fliesskommazahl <br>"     ;
        if(!is_float(42))       echo "42 ist keine Fliesskommazahl  <br>"     ;

        if(is_string(("42")))   echo "\"42\" ist eine Zeichenkette  <br>"     ;
        if(is_string(('42')))   echo " '42' ist eine Zeichenkette   <br>"     ;
        if(!is_string((42)))    echo " 42 ist keine Zeichenkette    <br>"     ;

        if(is_numeric("42"))        echo "\"42\" ist numerisch                  <br>"     ;
        if(is_numeric("42.0"))      echo "\"42.0\" ist ebenfalls numerisch      <br>"     ;
        if(is_numeric("-4.2e-3"))   echo "\"-4.2e-3\" ist auch numerisch        <br>"     ;
        if(is_numeric("42a"))       echo "\"42a\" ist nicht numerisch           <br>"     ;

        if(is_bool(true))           echo "true Boolean                  <br>"   ;
        if(is_bool(5>3 && 7<12))    echo " yes its a Boolean            <br>"   ;
        if(is_bool(true))           echo "\"true\" ist nicht boolean    <br> "  ;

    ?>
    </body>
    </html>
