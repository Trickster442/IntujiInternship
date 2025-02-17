<?php
require_once './Operation.php';
class Addition extends Operation{
    public $firstNum;
    public $secondNum;
    public $operator;
    public function __construct($firstNum,$secondNum){
        $this->firstNum = $firstNum;  
        $this->secondNum = $secondNum;
    }  

    public function calculate(): float{
        return (float) $this->firstNum + (float) $this->secondNum;
    }

}


?>