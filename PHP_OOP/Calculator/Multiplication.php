<?php
require_once './Operation.php';
class Multiplication extends Operation{
    public $firstNum;
    public $secondNum;
    public $operator;
    public function __construct($firstNum,$secondNum){
        $this->firstNum = $firstNum;  
        $this->secondNum = $secondNum;
    }  

    public function calculate(): float{
        return $this->firstNum * $this->secondNum;
    }

}


?>