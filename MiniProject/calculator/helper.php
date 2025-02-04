<?php
declare(strict_types=1);
session_start(); 
include './precedence.php';

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
        if ($_POST['operator'] === 'C') {
            $_SESSION['display'] = []; // Reset session
        } elseif ($_POST['operator'] === 'D'){ 
            array_pop($_SESSION['display']);
        } elseif ($_POST['operator'] === '=') {
            $expression = implode('', $_SESSION['display']);
            try {
                if(!empty($expression)){
                $result = calculate_by_precedence($expression); // Calculate result
                $_SESSION['display'] = [strval($result)]; 
                } 
            } catch (Exception $e) {
                $_SESSION['display'] = ['Error'];
            }
        } else {
            array_push($_SESSION['display'], $_POST['operator']); // Append operator to session
        }
    }
}

// Prepare display value
$displayValue = implode('', $_SESSION['display']);
