<?php
class TanCalculation
{
    public $number;
    
    public function __construct($number){
        $this->number = $number; 
        
    }  

    public function calculate(): float{
        return tan(deg2rad((float) $this->number));    
    }

}

?>