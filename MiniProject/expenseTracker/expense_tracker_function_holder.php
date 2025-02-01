<?php
function generate_user_form(){
    $numDays = (int)$_POST["num_days"];
    if ($numDays > 0) {
        echo '<form method="post">';
        echo '<input type="hidden" name="num_days" value="' . $numDays . '">';
        for ($i = 1; $i <= $numDays; $i++) {
            echo "<input type='number' placeholder='Expense for Day $i' name='day_$i' step='0.01' value='" . (isset($_POST["day_$i"]) ? $_POST["day_$i"] : '') . "' min=0 required><br>";
        }
        echo '<button type="submit" name="calculate">Calculate</button>';
        echo '</form>';
    }

};

function calculate_expense(){
    $numDays = (int) $_POST["num_days"];
        $expenses = [];

        for ($i = 1; $i <= $numDays; $i++) {
            if (isset($_POST["day_$i"])) {
                $expenses["Day $i"] = (float) $_POST["day_$i"];
            }
        }

        if (!empty($expenses)) {
            $total = array_sum($expenses);
            echo '<div class="result">';
            echo '<h3>Results :</h3>';
            echo '<p>Total: <span class="highlight">$' . round($total, 2) . '</span></p>';

            $average = round($total / $numDays, 2);
            echo '<p>Average: <span class="highlight">$' . $average . '</span></p>';

            $minExp = min($expenses);
            $maxExp = max($expenses);
            $minDay = array_search($minExp, $expenses);
            $maxDay = array_search($maxExp, $expenses);

            echo '<p>The day with minimum expenses is <span class="highlight">' . $minDay . '</span> with expenses of: <span class="highlight">$' . round($minExp, 2) . '</span></p>';
            echo '<p>The day with maximum expenses is <span class="highlight">' . $maxDay . '</span> with expenses of: <span class="highlight">$' . round($maxExp, 2) . '</span></p>';
            echo '</div>';
}
}