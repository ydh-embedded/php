<?php
class Raumschiff
{
  function __construct(private $bezeichnung = 'unbekannt', private $modell = 'unbekannt', private $entfernung = 0)
  {
  }

  function __toString()
  {
    return "$this->bezeichnung ($this->modell) => Erdentfernung: $this->entfernung Lichtjahre<br>";
  }
}