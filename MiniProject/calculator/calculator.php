<?php declare(strict_types= 1);
include './helper.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="./calculator.css">
</head>
<body>
    <div class="calculator">
        <h2>PHP Calculator</h2> 
        <form method="POST">
            <input type="text" name="display" value="#" readonly>
            <div class="button-row">
                <button type="submit" name="digit" value="1">1</button>
                <button type="submit" name="digit" value="2">2</button>
                <button type="submit" name="digit" value="3">3</button>
                <button type="submit" name="operator" value="+" class="operator">+</button>
                <button type="submit" name="operator" value="(" class="operator">(</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="4">4</button>
                <button type="submit" name="digit" value="5">5</button>
                <button type="submit" name="digit" value="6">6</button>
                <button type="submit" name="operator" value="-" class="operator">-</button>
                <button type="submit" name="operator" value=")" class="operator">)</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="7">7</button>
                <button type="submit" name="digit" value="8">8</button>
                <button type="submit" name="digit" value="9">9</button>
                <button type="submit" name="operator" value="*" class="operator">*</button>
                <button type="submit" name="operator" value="." class="operator">.</button>
            </div>
            <div class="button-row">
                <button type="submit" name="digit" value="0">0</button>
                <button type="submit" name="operator" value="/" class="operator">/</button>
                <button type="submit" name="operator" value="C" class="clear">C</button>
                <button type="submit" name="operator" value="D" class="clear">CE</button>
                <button type="submit" name="operator" value="=" class="equal">=</button>
            </div>
        </form>
    </div>
</body>
</html>