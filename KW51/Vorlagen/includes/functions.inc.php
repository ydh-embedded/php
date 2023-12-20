<?php

/**
 * function sql2germanDate($db_datum)
 *
 * Wandelt ein SQL-formatiertes Datum in deutsches Datumsformat um
 *
 * @param string $db_datum Das SQL-formatierte Datum.
 * @return string Das Datum im deutschen Format.
 */
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

/**
 * function german2sqlDate($db_datum)
 *
 * Wandelt ein SQL-formatiertes Datum in deutsches Datumsformat um
 *
 * @param string $db_datum Das SQL-formatierte Datum.
 * @return string Das Datum im deutschen Format.
 */
function german2sqlDate($db_datum)
{
  /* deutsches Datum (TT.MM.JJJJ) */
  $feld = mb_split('\.', $db_datum);
  $tag = intval($feld[0]);
  $monat = intval($feld[1]);
  $jahr = intval($feld[2]);
  $ausgabe = sprintf("%'.04d-%'.02d-%'.02d", $jahr, $monat, $tag);;
  return $ausgabe;
}

/**
 * int_positiv( $bez, $text, &$zahl )
 *
 * prüft, ob die übergebene Zahl eine positive Ganzzahl ist
 *
 * @param string $bez Bezeichnung der zu prüfenden Zahl.
 * @param string $text  Die übergebene Zahl als Zeichenkette.
 * @param int   $zahl   Die überprüfte Zahl als Ganzzahl mit Referenz auf das übergebene Parameter
 * @return bool Prüfungsergebnis true/false.
 */
function int_positiv($bez, $text, &$zahl)
{
  if (!is_numeric($text)) {
    echo "<p style='color:#a00;'>$bez: Zahl eintragen!</p>";
    return false;
  }

  if ($text === '0') {
    $zahl = 0;
    return true;
  }

  $zahl = intval($text);
  if ($zahl < 0) {
    echo "<p style='color:#a00;'>$bez: Ganze Zahl >= 0 eintragen!</p>";
    return false;
  } else {
    return true;
  }
}


/**
 * float_positiv( $bez, $text, &$zahl )
 *
 * prüft, ob die übergebene Zahl eine positive Fließkommazahl ist
 *
 * @param string $bez Bezeichnung der zu prüfenden Zahl.
 * @param string $text  Die übergebene Zahl als Zeichenkette.
 * @param float   $zahl   Die überprüfte Zahl als Fließkommazahl mit Referenz auf das übergebene Parameter
 * @return bool Prüfungsergebnis true/false.
 */
function float_positiv($bez, $text, &$zahl)
{
  if (!is_numeric($text)) {
    echo "<p style='color:#a00;'>$bez: Zahl eintragen!</p>";
    return false;
  }

  if ($text === '0' || $text === '0.0') {
    $zahl = 0.0;
    return true;
  }

  $zahl = floatval($text);
  if ($zahl < 0) {
    echo "<p style='color:#a00;'>$bez: Zahl >= 0 eintragen!</p>";
    return false;
  } else {
    return true;
  }
}

/**
 * pk_exists( $bez, $pk, $ori, $pdo, $tab, $feld )
 *
 * Prüft, ob ein zu ändernder Primärschlüssel in der DB bereits existiert.
 *
 * @param string $bez Bezeichnung des zu ändernden Feldes.
 * @param int $pk Der neue Primary-Key.
 * @param string $ori Der alte Primary-Key.
 * @param object $pdo Verbindungs-Kennung zum DBMS.
 * @param string $tab Datenbank-Tabelle.
 * @param string $feld Zu änderndes Feld der Datenbank-Tabelle.
 * @return bool Prüfungsergebnis true/false.
 */
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
