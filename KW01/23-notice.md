# Formulare

## Passwort Überprüfung

### regulare Aussdrücke / regular expressions

Eine Beschreibung der Formel von Gauß:
Ostern fällt im Jahr J auf den (e+D+1)-ten Tag nach dem 21. März, wobei gilt:

d = ((15 + J/100 – J/400 – (8 * J/100 + 13) / 25) mod 30 + 19 * (J mod 19)) mod 30
   Falls d = 29, ist D = 28.
   Falls d = 28 und J mod 17 >= 11, ist D = 27.
   Falls d weder 28 noch 29, ist D = d.

e = (2 * (J mod 4) + 4 * (J mod 7) + 6 * D + (6 + J/100 – J/400 – 2) mod 7) mod 7

Zur Umsetzung der Formel in einem PHP-Programm gibt es die beiden folgenden Hinweise:

1) "mod" entspricht dem Operator Modulo (%) aus PHP.
   Dies ist also der ganzzahlige Rest einer Division.

2) Alle vorkommenden Divisionen (zum Beispiel J/100) sind Ganzzahldivisionen.
   Die Stellen hinter dem Komma werden dabei abgeschnitten.
   Dazu können Sie seit PHP 7.0 die Funktion intdiv() benutzen. Ein Beispiel:
      Der Ausdruck 1952/100 ergibt den Wert 19.52 (mit Nachkommastellen).
      Der Aufruf intdiv(1952/100) ergibt den Wert 19 ohne Nachkommastellen, also eine Ganzzahldivision. 
