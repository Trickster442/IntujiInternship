<?php
class Practise
{
    public $num1;

    public function __construct($num1){
        $this->num1 = $num1;
    }

    public function get_num1(){
        return $this->num1;
    }

    public function set_num1($num1){
        $this->num1 = $num1;
    }
}


$prac1 = new Practise(5);
$get_num = $prac1->get_num1();
echo $get_num . '<br>';
$prac1->set_num1(10);
$get_num = $prac1->get_num1();
echo $get_num;

?>