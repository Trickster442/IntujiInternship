<?php declare(strict_types= 1); ?>

<?php 
//coding style for operators according to PER style 2.0


//Unary operators
//The increment/decrement operators MUST NOT have any space between the operator and operand:
$i = 0;
$i++;
echo $i;
echo '<br>';
echo $i++;  //first prints and then adds value to $i;
echo '<br>';
echo ++$i;  //first adds and then prints


// Binary Operators
// All binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators MUST be preceded and 
// followed by at least one space

//Arithmetic
$x = 10;  
$y = 6;

echo $x / $y;
echo '<br>';

//Assignment
$name = 'Sandip';
echo $name;
echo '<br>';
//Ternary Operators
// The conditional operator, also known simply as the ternary operator, 
// MUST be preceded and followed by at least one space around both the ? and : characters:

echo $status = ($name == 'Sandip') ? 'Sandip' : 'Other';
echo '<br>';



