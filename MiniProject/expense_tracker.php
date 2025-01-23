<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            padding-top: 20vh;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #4CAF50;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            text-align: left;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .result h3 {
            text-align: center ;
            color: #333;
        }
        .result p {
            font-size: 1.1rem;
            color: #333;
            margin: 5px 0;
        }
        .result .highlight {
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Expense Calculator</h1>
    <form method="post">
        <input type="number" placeholder="Add expense for Sunday" id="sunday" name="sunday" step="0.01" value="<?php echo isset($_POST['sunday']) ? $_POST['sunday'] : ''; ?>" required><br>
        <input type="number" placeholder="Add expense for Monday" id="monday" name="monday" step="0.01" value="<?php echo isset($_POST['monday']) ? $_POST['monday'] : ''; ?>" required ><br>
        <input type="number" placeholder="Add expense for Tuesday" id="tuesday" name="tuesday" step="0.01" value="<?php echo isset($_POST['tuesday']) ? $_POST['tuesday'] : ''; ?>" required><br>
        <input type="number" placeholder="Add expense for Wednesday" id="wednesday" name="wednesday" step="0.01" value="<?php echo isset($_POST['wednesday']) ? $_POST['wednesday'] : ''; ?>" required><br>
        <input type="number" placeholder="Add expense for Thursday" id="thursday" name="thursday" step="0.01" value="<?php echo isset($_POST['thursday']) ? $_POST['thursday'] : ''; ?>" required><br>
        <input type="number" placeholder="Add expense for Friday" id="friday" name="friday" step="0.01" value="<?php echo isset($_POST['friday']) ? $_POST['friday'] : ''; ?>" required><br>
        <input type="number" placeholder="Add expense for Saturday" id="saturday" name="saturday" step="0.01" value="<?php echo isset($_POST['saturday']) ? $_POST['saturday'] : ''; ?>" required><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $expenses = array();

        // Collect the input values for each day
        if (isset($_POST["sunday"])) {
            $expenses["Sunday"] = $_POST["sunday"];
        }
        if (isset($_POST["monday"])) {
            $expenses["Monday"] = $_POST["monday"];
        }
        if (isset($_POST["tuesday"])) {
            $expenses["Tuesday"] = $_POST["tuesday"];
        }
        if (isset($_POST["wednesday"])) {
            $expenses["Wednesday"] = $_POST["wednesday"];
        }
        if (isset($_POST["thursday"])) {
            $expenses["Thursday"] = $_POST["thursday"];
        }
        if (isset($_POST["friday"])) {
            $expenses["Friday"] = $_POST["friday"];
        }
        if (isset($_POST["saturday"])) {
            $expenses["Saturday"] = $_POST["saturday"];
        }

        // Handling the 'Calculate' button 
        if (isset($_POST["calculate"])) {
            $total = array_sum($expenses);  // Summing the expenses
            echo "<div class='result'>";
            echo "<h3>Results :</h3>";
            echo "<p>Total: <span class='highlight'>$" . $total . "</span></p>";

            $average = round($total / 7, 2);  // two decimal points
            echo "<p>Average: <span class='highlight'>$" . $average . "</span></p>";

            $minExp = min($expenses);  // minimum value
            $maxExp = max($expenses);  // maximum value
            $minDay = array_search($minExp, $expenses);  // key of min value
            $maxDay = array_search($maxExp, $expenses);  // key of max value

            echo "<p>The day with minimum expenses is <span class='highlight'>" . $minDay . "</span> with expenses of: <span class='highlight'>$" . $minExp . "</span></p>";
            echo "<p>The day with maximum expenses is <span class='highlight'>" . $maxDay . "</span> with expenses of: <span class='highlight'>$" . $maxExp . "</span></p>";
            echo "</div>";

            
        }
    }
    ?>
</div>

</body>
</html>
