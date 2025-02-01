<?php declare(strict_types=1); ?>

<?php
$operators = [];
$operands = [];
$check_operator = ['+', '-', '*' , '/' ];

function set_precedence(string $a) : int {
    if ($a === '/' || $a === '*') return 2;
    if ($a === '+' || $a === '-') return 1;
    return 0; 
}

function add_to_array(array $a)  {
    global $check_operator, $operators, $operands;
    foreach ($a as $k) {
        if (in_array($k, $check_operator)) {
            $operators[] = $k;
        } else {
            $operands[] = $k;
        }
    }
}


$expression = ['2' , '-' , '5', '+', '6' , '*' , '7'];
add_to_array($expression);

print_r($operators);
print_r($operands);
?>
