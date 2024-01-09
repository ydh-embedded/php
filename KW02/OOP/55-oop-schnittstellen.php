<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP Schnittstellen</title>
</head>

<body>
  <h1>OOP Schnittstellen</h1>
  <?php

  /**
   * Ein Interface für Tiere. Jedes
   * Tier soll eine Rasse haben, der über getRasse() abgerufen werden kann.
   */
  interface Tier
  {
    // Die Methode wird über das Interface nur vorgeschrieben,
    // daher darf sie keinen Inhalt haben.
    public function getRasse();
  }


  /**
   * Ein Interface für Haustiere. Jedes
   * Haustier soll einen Namen haben, der über getName() abgerufen werden kann.
   */
  interface Haustier
  {
    public function getName();
  }


  /**
   * Die Klasse Hund.
   * Für jeden Hund darf ein Name und eine Rasse festgelegt werden. 
   * Über getName() bzw. getRasse kann er - entsprechend der Vorschrift von Haustier bzw. Tier - abgefragt werden.
   */
  class Hund implements Tier, Haustier
  {

    public function __construct(private $name, private $rasse = 'Hund')
    {
    }

    // Die vom Interface Tier verlangte Methode
    public function getRasse()
    {
      return $this->rasse;
    }

    // Die vom Interface Haustier verlangte Methode
    public function getName()
    {
      return $this->name;
    }


  }


  /**
   * Klasse für eine virtuelle Katze. Es soll hier kein Name
   * beim Erzeugen eines Objekts festgelegt werden, stattdessen wird zufällig einer
   * ausgewählt. Die Methoden getName() und getRasse() müssen dennoch in jedem Fall angeboten werden, da die Klasse
   * Interface Tier und Haustier einbindet.
   */
  class VirtuelleKatze implements Tier, Haustier
  {

    public function __construct(private $name = 'unbekannt', private $rasse = 'Katze')
    {
      $names = array('Tigger', 'CyberKatze', 'Mauzer', 'Mausejäger');
      shuffle($names); // Mischt die Elemente eines Arrays
      $this->name = array_pop($names);
    }

    public function getName()
    {
      return $this->name;
    }

    public function getRasse() {
      return $this->rasse;
    }
  }


  $einHund = new Hund('Rex');
  $vKatze = new VirtuelleKatze();

  echo 'Rasse: ' . $einHund->getRasse() . ', Name: ' . $einHund->getName() . '<br>';
  echo 'Rasse: ' . $vKatze->getRasse() . ', Name: ' . $vKatze->getName() . '<br>';
  

  ?>
</body>

</html>