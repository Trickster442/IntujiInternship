<?php
class CosCalculation
{
    public $number;
    
    public function __construct($number){
        $this->number = $number; 
        
    }  

    public function calculate(): float{
        return cos(deg2rad((float) $this->number));    
    }

}

?>