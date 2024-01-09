/**
 * new_pk_exists( $bez, $pk, $pdo, $tab )
 *
 * Prüft, ob ein Primärschlüssel in der DB bereits existiert.
 *
 * @param string $bez Bezeichnung des Primary-Key-Feldes.
 * @param int    $pk  Der neue Primary-Key.
 * @param object $pdo Verbindungs-Kennung zum DBMS.
 * @param string $tab Datenbank-Tabelle.
 * 
 * @return bool Prüfungsergebnis true/false.
 */
function new_pk_exists($bez, $pk, $pdo, $tab)
{
  // Selektiere das PK-Feld mit dem neuen Wert, wenn dieser ungleich dem alten Wert ist
  $sql = "SELECT $bez FROM $tab WHERE $bez = :pk";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':pk', $pk);
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