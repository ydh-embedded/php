<?php
/**
 * get_db_error( $db, $sql, $pdo )
 *
 * Gibt eine formatierte Fehlermeldung zu SQL-Abfragen aus
 *
 * @author Jörg Aderhold joerg@jaderbass.de
 *
 * @param mysqli|pdo $db    				 required Server-Kennung
 * @param string $sql       				 required zugehörige SQL-Anweisung
 * @param boolean|PDOException $pdo  optional Wird PDO verwendet: Exceptionobjekt, default=false
 *
 * @return string Die formatierte Meldung.
 */



function get_db_error( mysqli|pdo $db, string $sql, bool|PDOException $pdo = false ):string {

    if( $pdo ) {
        $errnum = $pdo->getCode();
        $errmsg = $pdo->getMessage() . '<br>in: <b>' . $pdo->getFile() . '</b>, Zeile <b>' . $pdo->getLine() . '</b>';
    } else {
        $errnum = mysqli_errno( $db );
        $errmsg = mysqli_error( $db );
    }
    $search = array( ';', 'manual', 'near' );
    $replace = array( ';<br>', '<a href="https://mariadb.com/kb/en/mariadb-error-codes/" target="_blank">manual</a>', 'near<br>' );
    if( !$pdo ) $errmsg = str_replace( $search, $replace, mysqli_error( $db ) );
    $errdisplay  = '<div class="alert alert-danger">';
    $errdisplay .= '<h4 class="alert-heading">SQL-Fehler!</h4>';
    $errdisplay .= "<p><b>Fehler-Code:</b> <code>$errnum</code></p>";
    $errdisplay .= '<hr>';
    $errdisplay .= '<p><b>Der SQL-Server meldet:</b><br>';
    $errdisplay .= "<code>$errmsg</code></p>";
    $errdisplay .= '<hr>';
    $errdisplay .= '<p><b>Die fehlerhafte SQL-Anweisung:</b><br>';
    $errdisplay .= '<code>' . highlightText($sql) . '</code></p>';
    $errdisplay .= '</div>';
    return $errdisplay;
}

/**
 * highlightText($text)
 *
 * Formatiert Code-Ausschnitte
 *
 * @author Stanislav Eckert stanislav.eckert@viszon.de
 * @url https://www.php.net/manual/de/function.highlight-string.php#118550
 *
 * @param string $text der zu formatierende Code
 *
 * @return string der formatierte Code.
 **/





function highlightText(string $text):string {

    $text = trim($text);
    $text = highlight_string("<?php " , $text , true);  // highlight_string() requires opening PHP tag or otherwise it will not colorize the text
    $text = trim($text);


    $text = preg_replace("|^\\<code\\>\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>|", "", $text, 1);  // remove prefix

    $text = preg_replace("|\\</code\\>\$|", "", $text, 1);  // remove suffix 1
    $text = trim($text);  // remove line breaks
    $text = preg_replace("|\\</span\\>\$|", "", $text, 1);  // remove suffix 2
    $text = trim($text);  // remove line breaks
    $text = preg_replace("|^(\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>)(<\\?php&nbsp;)(.*?)(\\</span\\>)|", "\$1\$3\$4", $text);  // remove custom added "<?php "
    return $text;
}

?>