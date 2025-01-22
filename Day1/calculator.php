<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Calculator</title>
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
            width: 200px;
            padding: 15px;
            font-size: 1.5em;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: right;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
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

        button:active {
            background-color: #ccc;
        }

        .operator {
            background-color: #ff9800;
            color: white;
        }

        .operator:hover {
            background-color: #e68900;
        }

        .equal {
            background-color: #4caf50;
            color: white;
        }

        .equal:hover {
            background-color: #45a049;
        }

        .clear {
            background-color: #f44336;
            color: white;
        }

        .clear:hover {
            background-color: #e53935;
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
            <input type="text" name="display" id="display" readonly><br>

            <!-- Number Buttons -->
            <div class="button-row">
                <button type="submit" name="digit" value="1">1</button>
                <button type="submit" name="digit" value="2">2</button>
                <button type="submit" name="digit" value="3">3</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="4">4</button>
                <button type="submit" name="digit" value="5">5</button>
                <button type="submit" name="digit" value="6">6</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="7">7</button>
                <button type="submit" name="digit" value="8">8</button>
                <button type="submit" name="digit" value="9">9</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="0">0</button>
            </div>

            <!-- Operator Buttons -->
            <div class="button-row">
                <button type="submit" name="operator" value="+" class="operator">+</button>
                <button type="submit" name="operator" value="-" class="operator">-</button>
            </div>
            <div class="button-row">
                <button type="submit" name="operator" value="*" class="operator">*</button>
                <button type="submit" name="operator" value="/" class="operator">/</button>
            </div>

            <!-- Equal and Clear Buttons -->
            <div class="button-row">
                <button type="submit" name="equals" value="=" class="equal">=</button>
                <button type="submit" name="clear" value="clear" class="clear">C</button>
            </div>
        </form>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store the operations (digits and operators)
    $operations = [];

    // Check if a digit is pressed and add it to the operations array
    if (isset($_POST["digit"])) {
        $operations[] = $_POST["digit"];
    }

    // Check if an operator is pressed and add it to the operations array
    if (isset($_POST["operator"])) {
        $operator = $_POST["operator"];
        $operations[] = $operator;

        // Stop adding operations if "=" is clicked
        if ($operator == "=") {
            echo "Operations collected: ";
            foreach ($operations as $operation) {
                echo $operation . " ";
            }
            echo "<br>";

            // Process the operations (basic example, you could perform the actual calculation here)
            echo "<hr>Calculation Finished!";
            return;  // Stop further processing if "=" is clicked
        }
    }

    // If "=" is not clicked, we will continue to display the operations so far
    echo "Operations so far: ";
    foreach ($operations as $operation) {
        echo $operation . " ";
    }
    echo "<br>";
}
?>

    </div>

</body>
</html>
