<?php
class AccessModifier {
  public $name;
  protected $color;
  private $weight;
}

// $mango = new AccessModifier();
// $mango->name = 'Mango'; // OK
// $mango->color = 'Yellow'; // ERROR
// $mango->weight = '300'; // ERROR
// ?>