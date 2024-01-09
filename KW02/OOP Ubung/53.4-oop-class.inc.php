<?php

    class Bestellposten
    {
        function __construct(
            
            private $artikelname    = "unbekannt"     ,
            private $anzahl         = "unbekannt"     ,
            private $preis          = "0.0"           ,
            
            ){}
    
        function postenpreis()
        {
            return $this->anzahl * $this->preis       ;
        }

        function __toString()
        {
            return "$this->artikelname , $this->anzahl Stk. , $this->preis € ";
        }
    }

?>