<?php
require_once './Main.php';
require_once './TrigonoMain.php';

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
            't' => 3,  
            'c' => 3,  
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
                array_pop($operators);  // Pop the '('
            } else {
                while (!empty($operators) && end($operators) !== '(' &&
                    $precedence[end($operators)] >= $precedence[$token]) {
                    $output[] = array_pop($operators);
                }
                $operators[] = $token;
            }
        }
    
        // Pop remaining operators
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

            // Check for digits or decimal points to form numbers
            if (is_numeric($char) || $char === '.') {
                $number .= $char;
            } elseif ($char === 's' || $char === 't' || $char === 'c') {
                // Handle trigonometric functions (sin, tan, cos)
                if ($number !== '') {
                    $tokens[] = $number;
                    $number = '';
                }
                // Handle parentheses
                if ($number !== '') {
                    $tokens[] = $number;
                    $number = '';
                }
                $tokens[] = $char;
            } else {
                // Handle operators (+, -, *, /)
                if ($number !== '') {
                    $tokens[] = $number;
                    $number = '';
                }
                $tokens[] = $char;
            }
        }

        // If there's any remaining number, add it to tokens
        if ($number !== '') {
            $tokens[] = $number;
        }
        
        return $tokens;
    }
    
    function evaluate_rpn(array $tokens): float {
        $stack = [];
        $_SESSION['operation_steps'] = [];
        
        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($stack, $token);
            } elseif ($token === 's' || $token === 't' || $token === 'c') {
                // For trigonometric operations (sin, tan, cos)
                $right = array_pop($stack);
                $operation = new TrigonoMain($token, $right);
                $result = $operation->main();
                array_push($stack, $result);
                $operation_step = $token . $right;
                $_SESSION['operation_steps'][] = $operation_step;
            } else {
                // For normal binary operations
                $right = array_pop($stack);
                $left = array_pop($stack);
                $operation = new Main($token, $left, $right);
                $result = $operation->main();
                array_push($stack, $result);
                $operation_step = $left . $token . $right;
                $_SESSION['operation_steps'][] = $operation_step;
            }
        }

        return array_pop($stack);  // Return the final result
    }
}
?>
