<?php declare(strict_types=1); ?>

<?php
function calculate_by_precedence(array $exp): string{
    $check_operator = ['+', '-', '*', '/', '(', ')'];
    $expression = $exp;
    $operators = [];
    $output = [];

function get_precedence(string $op): int {
    return ($op === '/' || $op === '*') ? 2 : (($op === '+' || $op === '-') ? 1 : 0);
}

foreach ($expression as $token) {
    if (is_numeric($token)) {
        // If it's a number, add it to the output
        $output[] = $token;
    } elseif ($token === '(') {

        $operators[] = $token;
    } elseif ($token === ')') {
        // Pop from stack to output until '(' is found
        while (!empty($operators) && end($operators) !== '(') {
            $output[] = array_pop($operators);
        }
        array_pop($operators); 
    } else {
        
        while (!empty($operators) && get_precedence(end($operators)) >= get_precedence($token) && end($operators) !== '(') {
            $output[] = array_pop($operators);
        }
        $operators[] = $token;
    }
}

// Pop remaining operators from stack
while (!empty($operators)) {
    $output[] = array_pop($operators);
}


foreach($output as $k) {
    if (in_array($k, $check_operator)) {
        $operator_index = array_search($k, $output);
        $left_operand_index = $operator_index-2;
        $left_operand = (float) $output[$left_operand_index];
        $right_operand_index = $operator_index-1;  
        $right_operand = (float) $output[$right_operand_index];
        $result = perform_calculation($k, $left_operand , $right_operand);
        array_splice($output,$left_operand_index,3, $result);
    }
}

// Print results
return (string) $output[0];
}
?>

<?php
function perform_calculation(string $op, float $left, float $right): float {
    $result = 0;
    switch ($op) {
        case '+': 
            $result = $left + $right;
            break;
        case '-': 
            $result = $left - $right;
            break;
        case '*': 
            $result = $left * $right;
            break;
        case '/': 
            if ($right == 0) {
                throw new Exception("Division by zero is not allowed.");
            }
            $result = $left / $right;
            break;
        default:
            throw new Exception("Invalid operator.");
    }
    
    return $result;
}
?>

