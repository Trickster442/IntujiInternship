<?php
declare(strict_types= 1);
require_once './Addition.php';
require_once './Division.php';
require_once './Multiplication.php';
require_once './Subtract.php';
require_once './SinCalculation.php';
class Main
{
    public $operator;
    public $firstNum;
    public $secondNum;
    public function __construct($operator, $firstNum, $secondNum){
        $this->operator = $operator;    
        $this->firstNum = $firstNum;
        $this->secondNum = $secondNum;
    }

    public function main(): float|string {
        switch($this->operator){
            case "+":$add = new Addition($this->firstNum, $this->secondNum);
            return $add->calculate();
            case "-": $subtract = new Subtract($this->firstNum,$this->secondNum) ;
            return $subtract ->calculate();
            case "*": $multiply = new Multiplication($this->firstNum, $this->secondNum) ;
            return $multiply->calculate();
            case "/": $division = new Division($this->firstNum, $this->secondNum) ;
            return $division ->calculate();
            default:
            return "No operation";
        }

    }
}


?>