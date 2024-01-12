<?php


function sql2germanDate($db_datum)
        {
          /* Datumsformat aus DB JJJJ-MM-TT */
          $feld = mb_split('-', $db_datum);
          $tag = intval($feld[2]);
          $monat = intval($feld[1]);
          $jahr = intval($feld[0]);
          $ausgabe = sprintf("%'.02d.%'.02d.%'.04d", $tag, $monat, $jahr);
          return $ausgabe;
        }

function german2sqlDate($db_datum)
        {
          /* deutsches Datum (TT.MM.JJJJ) */
          $feld = mb_split('\.', $db_datum);

          // Prüfung ob im Array mindestens 3 Einträge vorhanden sind
          if( count($feld) < 3 ) return false;

          $tag = intval($feld[0]);
          $monat = intval($feld[1]);
          $jahr = intval($feld[2]);

          // Prüfung auf korrektesDatum
          if( ! checkdate( $monat, $tag, $jahr) ) return false;

          $ausgabe = sprintf("%'.04d-%'.02d-%'.02d", $jahr, $monat, $tag);
          return $ausgabe;
        }


function pk_exists($bez, $pk, $ori, $pdo, $tab, $feld)
        {
          // Selektiere das PK-Feld mit dem neuen Wert, wenn dieser ungleich dem alten Wert ist
          $sql = "SELECT * FROM $tab WHERE $feld = :feld AND $feld <> '$ori'";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':feld', $pk);
          $stmt->execute();
          $anzahl = $stmt->rowCount();
          $stmt = NULL;
          $pdo = NULL;

          // Wenn Die Anzahl der gefundenen Datensätze größer 0 ist, existiert der Primärschlüssel und die Funktion liefert true zurück
          if ($anzahl > 0) {
            echo "<p style='color:#a00;'>$bez: Bereits vorhanden</p>";
            return true;
          } else {
            return false;
          }
        }

function new_pk_exists($bez, $pk, $pdo, $tab)
        {
        //? Selektiere das PK-Feld mit dem neuen Wert, wenn dieser ungleich dem alten Wert ist

          $sql    = "SELECT $bez FROM $tab WHERE $bez = :pk";
          $stmt   = $pdo->prepare($sql)   ;
          $stmt->bindParam(':pk', $pk)    ;
          $stmt->execute()                ;
          $anzahl = $stmt->rowCount()     ;
          $stmt   = NULL  ;
          $pdo    = NULL  ;

        //? Wenn Die Anzahl der gefundenen Datensätze größer 0 ist, existiert der Primärschlüssel und die Funktion liefert true zurück

          if ($anzahl > 0) {
            echo "<p style='color:#a00;'>$bez: Bereits vorhanden</p>";
            return true;
          } else {
            return false;
          }
        }


function get_db_error( mysqli|pdo $db, string $sql, bool|PDOException $pdo = false ):string
        {
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


function highlightText(string $text):string
        {
            $text = trim($text);
            $text = highlight_string("<?php " . $text, true);  // highlight_string() requires opening PHP tag or otherwise it will not colorize the text
            $text = trim($text);
            $text = preg_replace("|^\\<code\\>\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>|", "", $text, 1);  // remove prefix
            $text = preg_replace("|\\</code\\>\$|", "", $text, 1);  // remove suffix 1
            $text = trim($text);  // remove line breaks
            $text = preg_replace("|\\</span\\>\$|", "", $text, 1);  // remove suffix 2
            $text = trim($text);  // remove line breaks
            $text = preg_replace("|^(\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>)(&lt;\\?php&nbsp;)(.*?)(\\</span\\>)|", "\$1\$3\$4", $text);  // remove custom added "<?php "
            return $text;
        }

?>