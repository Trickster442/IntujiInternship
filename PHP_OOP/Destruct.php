<?php
class Destruct
{
    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function __destruct(){
        echo "My name is " . $this -> name;
    }
}

$des1 = new Destruct("Sandip");

?>