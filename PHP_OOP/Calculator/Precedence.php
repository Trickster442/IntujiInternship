<?php
require_once './Main.php';
require_once './SinCalculation.php';

class Precedence {
    public function calculate_by_precedence(string $expression): float {
        $tokens = $this->format_expression($expression);
        $output = [];
        $operators = [];
    
        $precedence = [
            '+' => 1,
            '-' => 1,
            '*' => 2,
            '/' => 2,
            's' => 3,
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
                array_pop($operators);
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
    
        return $this->evaluate_rpn($output);
    }
    
    function format_expression(string $expression): array {
        $tokens = [];
        $number = '';
        for ($i = 0; $i < strlen($expression); $i++) {
            $char = $expression[$i];

            if (is_numeric($char) || $char === '.') {
                $number .= $char;
            } elseif ($char === 's') {
                $tokens[] = 's';
            } elseif ($char === '(' || $char === ')') {
                if ($number !== '') {
                    $tokens[] = $number;
                    $number = '';
                }
                $tokens[] = $char;
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
            } elseif ($token === 's') {
                $right = array_pop($stack);
                $operation = new SinCalculation($right);
                $result = $operation->calculate();
                array_push($stack, $result);
            } else {
                $right = array_pop($stack);
                $left = array_pop($stack);
                $operation = new Main($token, $left, $right);
                $result = $operation->main();
                array_push($stack, $result);
            }
        }
        return array_pop($stack);
    }
}

$expression = '88*45+0.9+(4-1)+s(90)';
$new = new Precedence();
echo $new->calculate_by_precedence($expression);
?>
