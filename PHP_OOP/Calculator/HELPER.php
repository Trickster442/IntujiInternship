<?php
declare(strict_types=1);
session_start(); 
require_once './Precedence.php';
$calculate = new Precedence();
?>

<?php
if (!isset($_SESSION["display"]) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    session_destroy();
    $_SESSION['display'] = [];
}

// Initialize session variable if it does not exist
if (!isset($_SESSION['display'])) {
    $_SESSION['display'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['digit'])) {
        array_push($_SESSION['display'], $_POST['digit']); // Append digit to session
    }

    if (isset($_POST['operator'])) {
        //get last operator
        $operator_lists = ['+', '-', '/', '*', 's', 't', 'c', '.', '(', ')'];
        $last_item = end($_SESSION['display']);

        if ($_POST['operator'] === 'C') {
            $_SESSION['display'] = [];
            $_SESSION['operation_steps'] = [];
        } elseif ($_POST['operator'] === 'D'){ 
            array_pop($_SESSION['display']);
        } elseif ($_POST['operator'] === '=') {
            $expression = implode('', $_SESSION['display']);
            try {
                if(!empty($expression)){
                $result = $calculate->calculate_by_precedence($expression); // Calculate result
                $_SESSION['display'] = [strval($result)]; 
                } 
            } catch (Exception $e) {
                $_SESSION['display'] = ['Error'];
            }
        } else {
            if ($_POST['operator'] == '(') {
                array_push($_SESSION['display'], $_POST['operator']); 
            }
            if (!in_array($last_item, $operator_lists)){
                array_push($_SESSION['display'], $_POST['operator']); 
            }
        }
    }
}
?>
