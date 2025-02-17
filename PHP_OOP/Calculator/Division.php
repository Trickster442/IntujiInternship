<?php
require_once './Operation.php';
class Division extends Operation{
    public $firstNum;
    public $secondNum;
    public $operator;
    public function __construct($firstNum,$secondNum){
        $this->firstNum = $firstNum;  
        $this->secondNum = $secondNum;
    }  

    public function calculate(): float|string{
        try{
            return $this->firstNum / $this->secondNum;
        } catch (Exception $e) {
            return throw $e;
        }
    }

}

?>