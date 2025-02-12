<?php
require_once './Operation.php';
class Addition extends Operation{
    public $first_num;
    public $second_num;
    public $operator;
    public function __construct($first_num,$second_num){
        $this->first_num = $first_num;  
        $this->second_num = $second_num;
    }  

    public function calculate(): float{
        return (float) $this->first_num + (float) $this->second_num;
    }

}


?>