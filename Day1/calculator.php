<?php declare(strict_types= 1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form method="POST">
        <input type="number" id="firstNum" name="firstNum" placeholder="First Number" required><br>
        <input type="number" id="secondNum" name="secondNum" placeholder="Second Number" required><br>
        
        <!-- Dropdown for operator selection -->
        <select name="operator" id="operator" required>
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select><br>

        <input type="submit" value="Calculate">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Getting the numbers and operator from the form
        $firstNum = isset($_POST['firstNum']) ? (float)$_POST['firstNum'] : 0;
        $secondNum = isset($_POST['secondNum']) ? (float)$_POST['secondNum'] : 0;
        $operator = $_POST['operator'];

        // Initialize result variable
        $result = null;
        $errorMessage = "";

        // Perform calculation based on the selected operator
        switch ($operator) {
            case 'add':
                $result = $firstNum + $secondNum;
                break; 
            case 'subtract':
                $result = $firstNum - $secondNum;
                break;
            case 'multiply':
                $result = $firstNum * $secondNum;
                break;
            case 'divide':
                if ($secondNum != 0) {
                    $result = $firstNum / $secondNum;
                } else {
                    $errorMessage = "Error: Division by zero!";
                }
                break;
        }

        // Display result or error message
        if ($errorMessage) {
            echo "<h3>$errorMessage</h3>";
        } else {
            echo "<h3>Result: $result</h3>";
        }
    }
    ?>
</body>
</html>
