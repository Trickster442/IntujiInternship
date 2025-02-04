<?php declare(strict_types=1); 
session_start(); // Start session to retain values
include('./precedence.php');

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
        array_push($_SESSION['display'],$_POST['digit']); // Append digit to session
    }

    if (isset($_POST['operator'])) {
        if ($_POST['operator'] === 'C') {
            $_SESSION['display'] = []; // reset session
        } elseif ($_POST['operator'] === '=') {
            $expression = $_SESSION['display'];
            try {
                $result = calculate_by_precedence($expression); // Calculate result
                $_SESSION['display'] = [$result]; // Store result in session
            } catch (Exception $e) {
                $_SESSION['display'] = ['Error'];
            }   
        } else {
            array_push($_SESSION['display'] , $_POST['operator']) ; // append other operator to the session
        }
    }
}

// Prepare display value
$displayValue = implode('', $_SESSION['display']);
?>
