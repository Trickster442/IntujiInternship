<?php declare(strict_types=1); ?>

<!-- HTML Form -->
<form method="post">
    <input type="number" placeholder="Add expense for Sunday" id="sunday" name="sunday"><br>
    <input type="number" placeholder="Add expense for Monday" id="monday" name="monday"><br>
    <input type="number" placeholder="Add expense for Tuesday" id="tuesday" name="tuesday"><br>
    <input type="number" placeholder="Add expense for Wednesday" id="wednesday" name="wednesday"><br>
    <input type="number" placeholder="Add expense for Thursday" id="thursday" name="thursday"><br>
    <input type="number" placeholder="Add expense for Friday" id="friday" name="friday"><br>
    <input type="number" placeholder="Add expense for Saturday" id="saturday" name="saturday"><br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expenses = array();
    
    // Loop through POST data and store non-empty values in the $expenses array
    foreach ($_POST as $name => $value) {
        if (!empty($value)) {  // Ensure the input is not empty
            $expenses[$name] = $value;
        }
    }

    // Call the calculate function if the form is submitted
    if (isset($_POST["submit"])) {
        calculate($expenses);  
        $expenses = [];
    }

}

// Function to calculate and display something based on expenses
function calculate(array $a) {
    // For now, just echo the expenses count as an example calculation
    echo "Total number of expenses entered: " . count($a) . "<br>";
    // You can add more calculations here, like summing the values
    $total = array_sum($a);
    $count = count($a);
    $average = $total / $count ;
    echo "Total expenses: " . $total . "<br>";
    echo "Average is: " . $average . "<br>";

    
}
?>
