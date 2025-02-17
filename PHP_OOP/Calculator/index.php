<?php declare(strict_types= 1); 
namespace Calculator;
include './HELPER.php';

$displayValue = implode('', $_SESSION['display']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>PHP Calculator</title>
    <style>
        .button-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-top: 10px;
        }
        .button-grid button {
            background-color: #4a5568;
            color: white;
            padding: 15px;
            font-size: 18px;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .button-grid button:hover {
            background-color: #2d3748;
        }
        .operator {
            background-color: #3182ce;
        }
        .operator:hover {
            background-color: #2b6cb0;
        }
        .clear {
            background-color: #e53e3e;
        }
        .clear:hover {
            background-color: #c53030;
        }
        .equal {
            background-color: #38a169;
        }
        .equal:hover {
            background-color: #2f855a;
        }
    </style>
</head>
<body class="w-screen bg-gray-300 flex justify-center items-center h-screen"> 
    <div class="w-1/4 bg-gray-800 p-8 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-medium text-center text-white">PHP Calculator</h1>
        <form method="POST" class="mt-4">
            <input type="text" name="display" value="<?= htmlspecialchars($displayValue) ?>" class="rounded-2xl h-12 w-full bg-blue-400 text-white text-right p-2 text-xl" readonly>
            <div class="button-grid">
                <button type="submit" name="digit" value="1">1</button>
                <button type="submit" name="digit" value="2">2</button>
                <button type="submit" name="digit" value="3">3</button>
                <button type="submit" name="operator" value="+" class="operator">+</button>
                <button type="submit" name="operator" value="(" class="operator">(</button>
                <button type="submit" name="digit" value="4">4</button>
                <button type="submit" name="digit" value="5">5</button>
                <button type="submit" name="digit" value="6">6</button>
                <button type="submit" name="operator" value="-" class="operator">-</button>
                <button type="submit" name="operator" value=")" class="operator">)</button>
                <button type="submit" name="digit" value="7">7</button>
                <button type="submit" name="digit" value="8">8</button>
                <button type="submit" name="digit" value="9">9</button>
                <button type="submit" name="operator" value="*" class="operator">*</button>
                <button type="submit" name="operator" value="." class="operator">.</button>
                <button type="submit" name="digit" value="0">0</button>
                <button type="submit" name="operator" value="/" class="operator">/</button>
                <button type="submit" name="operator" value="s">sin</button>
                <button type="submit" name="operator" value="c">cos</button>
                <button type="submit" name="operator" value="t">tan</button>
                <button type="submit" name="operator" value="C" class="clear">C</button>
                <button type="submit" name="operator" value="D" class="clear">CE</button>
                <button type="submit" name="operator" value="=" class="equal">=</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (!empty($_SESSION['operation_steps']) && is_array($_SESSION['operation_steps'])) {
    echo '<form method="post" style="
        margin-left: 16px;
        color: red;
        border: dashed 2px black;
        font-size: 20px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        width: fit-content;
        max-width: 90%;
    ">';
    
    foreach ($_SESSION['operation_steps'] as $key => $value) {
        echo '<p style="
            margin: 5px 0;
            font-weight: bold;
            color: black;
        ">Step ' . ($key + 1) . ': ' . htmlspecialchars($value) . '</p>';
    }
    echo '</form>';
}

if (!empty($_SESSION['result_steps'])) {
    echo '<div style="
        margin-left: 10px;
        margin-top: 10px;
        padding: 10px;
        border: solid 2px black;
        background-color: #eaf4fc;
        color: #333;
        border-radius: 8px;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        font-size: 18px;
        display: inline-block;
        width: auto;
        max-height: 200px;
        overflow-y: auto;
    ">';

    foreach ($_SESSION['result_steps'] as $key => $value) {
        echo '<p style="
            margin: 5px 0;
            font-weight: bold;
        ">' . $key . ' = <span style="color: blue;">' . $value . '</span></p>';
    }

    echo '
    <form method="post" style="margin-top: 10px;">
        <button type="submit" name="clear_history" style="
            background-color: red;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        " onmouseover="this.style.backgroundColor=\'darkred\'" 
          onmouseout="this.style.backgroundColor=\'red\'">
          Clear History
        </button>
    </form>';

    echo '</div>';
}

if (isset($_POST['clear_history'])) {
    $_SESSION['result_steps'] = [];
}





