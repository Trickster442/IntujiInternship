<?php declare(strict_types=1); ?>
<?php
include('./expense_tracker_function_holder.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Expense Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgba(244, 247, 250, 0.9);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            padding-top: 10vh;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: rgb(244, 131, 131);
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        button {
            background-color:rgb(76, 134, 175);
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
            background-color: rgb(131, 143, 244);
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
            text-align: center;
            color: #333;
        }
        .result p {
            font-size: 1.1rem;
            color: #333;
            margin: 5px 0;
        }
        .result .highlight {
            font-weight: bold;
            color: rgb(131, 143, 244);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Expense Calculator</h1>
    <form method="post">
        <input type="number" placeholder="Enter the number of days" id="num_days" name="num_days" step="1" min=0 value="<?php echo isset($_POST['num_days']) ? $_POST['num_days'] : ''; ?>" required><br>
        <button type="submit" name="generate">Generate Number of Days</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["generate"])) {
        generate_user_form();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["calculate"])) {
        calculate_expense(); 
    }
    ?>
</div>

</body>
</html>
