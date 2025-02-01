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
    <link rel="stylesheet" href="./expense_tracker.css">
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
