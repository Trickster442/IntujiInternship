<?php
declare(strict_types= 1);
require_once './SinCalculation.php';
require_once './CosCalculation.php';
require_once './TanCalculation.php';

class TrigonoMain
{
    public $operator;
    public $firstNum;
    public function __construct($operator, $firstNum){
        $this->operator = $operator;    
        $this->firstNum = $firstNum;

    }

    public function main(): float|string {
        switch($this->operator){
            case "s": $sin = new SinCalculation($this->firstNum);
            return $sin->calculate();
            case "t" : $tan = new TanCalculation($this->firstNum) ;
            return $tan ->calculate();
            case "c" : $cos = new CosCalculation($this->firstNum);
            return $cos->calculate();
            default:
            return "No operation";
        }

    }
}


?>