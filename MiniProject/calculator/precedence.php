<?php
function calculate_by_precedence(string $expression): float {
    $tokens = format_expression($expression);
    $output = [];
    $operators = [];

    $precedence = [
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2,
    ];

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $output[] = $token;
        } elseif ($token === '(') {
            $operators[] = $token;
        } elseif ($token === ')') {
            while (!empty($operators) && end($operators) !== '(') {
                $output[] = array_pop($operators);
            }
            array_pop($operators); // Remove '('
        } else {
            while (!empty($operators) && end($operators) !== '(' &&
                   $precedence[end($operators)] >= $precedence[$token]) {
                $output[] = array_pop($operators);
            }
            $operators[] = $token;
        }
    }

    while (!empty($operators)) {
        $output[] = array_pop($operators);
    }

    return evaluate_rpn($output);
}

function format_expression(string $expression): array {
    $tokens = [];
    $number = '';
    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];
        if (is_numeric($char) || $char === '.') {
            $number .= $char;
        } else {
            if ($number !== '') {
                $tokens[] = $number;
                $number = '';
            }
            $tokens[] = $char;
        }
    }
    if ($number !== '') {
        $tokens[] = $number;
    }
    return $tokens;
}

function evaluate_rpn(array $tokens): float {
    $stack = [];
    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            array_push($stack, $token);
        } else {
            $right = array_pop($stack);
            $left = array_pop($stack);
            $result = perform_calculation($token, (float)$left, (float)$right);
            array_push($stack, $result);
        }
    }
    return array_pop($stack);
}

function perform_calculation(string $op, float $left, float $right): float {
    switch ($op) {
        case '+': return $left + $right;
        case '-': return $left - $right;
        case '*': return $left * $right;
        case '/':
            if ($right == 0) {
                throw new Exception("Division by zero is not allowed.");
            }
            return $left / $right;
        default:
            throw new Exception("Invalid operator.");
    }
}
?>
