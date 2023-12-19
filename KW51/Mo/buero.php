<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Übung (Kapitel 3)</title>
</head>
<body>
  <h1>Mit Variablen, Operatoren und Konstanten arbeiten</h1>
  <?php
    
    // Variablen initialisieren
    $bezeichnung_tisch = 'Schreibtisch';
    $bezeichnung_stuhl = 'Bürostuhl';
    $bezeichnung_lampe = 'Lampe';
    $bezeichnung_pctisch = 'Computertisch';

    $preis_tisch = 1999;
    $preis_stuhl = 589;
    $preis_lampe = 29;
    $preis_pctisch = 999;

    const MWST = 0.19;
    const EURO = 'Euro';

    $netto_gesamt = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;

    $brutto_gesamt = $netto_gesamt * (1 + MWST);

    echo "<p>Netto-Gesamtpreis der eingekauften Artikel: $netto_gesamt " . EURO . '.</p>';
    echo "<p>Brutto-Gesamtpreis der eingekauften Artikel: $brutto_gesamt " . EURO . '.</p>';

    echo '<hr>';

    echo "<p>Brutto-Preis <b>$bezeichnung_tisch</b>: " . ($preis_tisch * (1 + MWST)) . ' ' . EURO . '.</p>';
    echo "<p>Brutto-Preis <b>$bezeichnung_stuhl</b>: " . ($preis_stuhl * (1 + MWST)) . ' ' . EURO . '.</p>';
    echo "<p>Brutto-Preis <b>$bezeichnung_lampe</b>: " . ($preis_lampe * (1 + MWST)) . ' ' . EURO . '.</p>';
    echo "<p>Brutto-Preis <b>$bezeichnung_pctisch</b>: " . ($preis_pctisch * (1 + MWST)) . ' ' . EURO . '.</p>';
    
  ?>
</body>
</html>