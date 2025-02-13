<?php
declare(strict_types= 1);
require_once './SinCalculation.php';
require_once './CosCalculation.php';
require_once './TanCalculation.php';

class TrigonoMain
{
    public $operator;
    public $first_num;
    public function __construct($operator, $first_num){
        $this->operator = $operator;    
        $this->first_num = $first_num;

    }

    public function main(): float|string {
        switch($this->operator){
            case "s": $sin = new SinCalculation($this->first_num);
            return $sin->calculate();
            case "t" : $tan = new TanCalculation($this->first_num) ;
            return $tan ->calculate();
            case "c" : $cos = new CosCalculation($this->first_num);
            return $cos->calculate();
            default:
            return "No operation";
        }

    }
}


?>