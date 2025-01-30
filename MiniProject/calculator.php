<?php declare(strict_types=1); 
session_start(); // Start session to retain values

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
        $_SESSION['display'][] = $_POST['digit']; // Append digit to session
    }

    if (isset($_POST['operator'])) {
        if ($_POST['operator'] === 'C') {
            $_SESSION['display'] = []; // reset session
        } elseif ($_POST['operator'] === '=') {
            $expression = implode('', $_SESSION['display']);
            try {
                $result = eval("return $expression;"); // Calculate result
                $_SESSION['display'] = [$result]; // Store result in session
            } catch (Exception $e) {
                $_SESSION['display'] = ['Error'];
            }
        } else {
            $_SESSION['display'][] = $_POST['operator']; // append other operator to the session
        }
    }
}

// Prepare display value
$displayValue = implode('', $_SESSION['display']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        input[type="text"] {
            width: 280px;
            padding: 10px;
            font-size: 1.5em;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: right;
            background: #eee;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 10px;
        }

        button {
            width: 70px;
            height: 70px;
            font-size: 1.5em;
            border: none;
            background-color: #f0f0f0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ddd;
        }

        .operator {
            background-color: #ff9800;
            color: white;
        }

        .equal {
            background-color: #4caf50;
            color: white;
        }

        .clear {
            background-color: #f44336;
            color: white;
        }

        h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>PHP Calculator</h2>

        <form method="POST">
            <input type="text" name="display" value="<?= htmlspecialchars($displayValue) ?>" readonly>

            <div class="button-row">
                <button type="submit" name="digit" value="1">1</button>
                <button type="submit" name="digit" value="2">2</button>
                <button type="submit" name="digit" value="3">3</button>
                <button type="submit" name="operator" value="+" class="operator">+</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="4">4</button>
                <button type="submit" name="digit" value="5">5</button>
                <button type="submit" name="digit" value="6">6</button>
                <button type="submit" name="operator" value="-" class="operator">-</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="7">7</button>
                <button type="submit" name="digit" value="8">8</button>
                <button type="submit" name="digit" value="9">9</button>
                <button type="submit" name="operator" value="*" class="operator">*</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="0">0</button>
                <button type="submit" name="operator" value="/" class="operator">/</button>
                <button type="submit" name="operator" value="C" class="clear">C</button>
                <button type="submit" name="operator" value="=" class="equal">=</button>
            </div>
        </form>
    </div>
</body>
</html>
