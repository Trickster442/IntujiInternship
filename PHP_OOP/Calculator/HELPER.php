<?php
declare(strict_types=1);
session_start(); 
require_once './Precedence.php';
$calculate = new Precedence();

// Initialize session variables if they do not exist
if (!isset($_SESSION['display'])) {
    $_SESSION['display'] = [];
    $_SESSION['result_steps'] = [];
}
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['digit'])) {
        $_SESSION['display'][] = $_POST['digit']; // Append digit to session
    }

    if (isset($_POST['operator'])) {
        $operator_lists = ['+', '-', '/', '*', 's', 't', 'c', '.', '(', ')'];
        $last_item = end($_SESSION['display']);

        switch ($_POST['operator']) {
            case 'C':
                $_SESSION['display'] = [];
                $_SESSION['operation_steps'] = [] ;
                break;
            case 'D':
                array_pop($_SESSION['display']);
                break;
            case '=':
                $expression = implode('', $_SESSION['display']);
                
                try {    
                    if (!empty($expression) && !in_array(mb_substr($expression,-1), array_slice($operator_lists, 0 ,-1))) {
                        $result = $calculate->calculate_by_precedence($expression); 
                        $_SESSION['result_steps'][$expression] = $result;
                        $_SESSION['display'] = [strval($result)]; 
                    }
                } catch (Exception $e) {
                    $_SESSION['display'] = ['Error'];
                }
                break;
            default:
                if (in_array($_POST['operator'], ['(', 's', 'c', 't']) || $last_item === ')') {
                    $_SESSION['display'][] = $_POST['operator'];
                } elseif (!in_array($last_item, $operator_lists)) {
                    $_SESSION['display'][] = $_POST['operator'];
                }
                break;
        }
    }
}
?>
