<?php
class SinCalculation
{
    public $number;
    
    public function __construct($number){
        $this->number = $number; 
        
    }  

    public function calculate(): float{
        return sin(deg2rad((float) $this->number));    
    }

}

?>