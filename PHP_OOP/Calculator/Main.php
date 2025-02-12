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
    public $first_num;
    public $second_num;
    public function __construct($operator, $first_num, $second_num){
        $this->operator = $operator;    
        $this->first_num = $first_num;
        $this->second_num = $second_num;
    }

    public function main(): float|string {
        switch($this->operator){
            case "+":$add = new Addition($this->first_num, $this->second_num);
            return $add->calculate();
            case "-": $subtract = new Subtract($this->first_num,$this->second_num) ;
            return $subtract ->calculate();
            case "*": $multiply = new Multiplication($this->first_num, $this->second_num) ;
            return $multiply->calculate();
            case "/": $division = new Division($this->first_num, $this->second_num) ;
            return $division ->calculate();
            default:
            return "No operation";
        }

    }
}


?>