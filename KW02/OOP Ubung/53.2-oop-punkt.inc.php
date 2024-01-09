
<?php

class ZweiD {
//  function __construct(private float $x , private float $y )
    function __construct(private float $x , private float $y )
    {

    }

//  function verschieben ( $x , $y ) {}
    function verschieben( $x , $y ){
        $this->x  += $x ;
        $this->y  += $y ;
    }


//  function___toString()
    function __toString()
    {
        return
        "(
            $this->x /
            $this->y
        )"
        ;
    }


}

?>
<?php

class Punkt {
//  function __construct(private float $x , private float $y )
    function __construct(private float $x , private float $y )
    {

    }

//  function verschieben ( $x , $y ) {}
    function verschieben( $x , $y ){
        $this->x  += $x ;
        $this->y  += $y ;
    }


//  function___toString()
    function __toString()
    {
        return
        "(
            $this->x /
            $this->y
        )"
        ;
    }


}

?>

