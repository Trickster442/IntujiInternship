<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Score Form</title>
    <link rel="stylesheet" href="./grade_analyzer.css"></link>
</head>
<body>

<div class="container">

    <!-- First form to input number of students -->
    <div class="form-section">
        <h1>Enter Student Data</h1>
        <form method="post">
            <label for="num_of_students">Enter the number of students:</label>
            <input type="number" name="num_of_students" id="num_of_students" value="<?php echo isset($_POST['num_of_students']) ? $_POST['num_of_students'] : ''; ?>" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php 
    // Check if number of students has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["name"])) {
        $num_of_students = (int) $_POST["num_of_students"];
        echo "Number of students: " . $num_of_students . "<br>";

        // Generate input fields for name and score dynamically based on number of students
        echo '<div class="form-section"><form method="post">';
        for ($i = 0; $i < $num_of_students; $i++) {
            echo "
            <label>Name of Student " . ($i + 1) . ":</label>
            <input type='text' name='name[$i]' required><br>
            <label>Score of Student " . ($i + 1) . ":</label>
            <input type='number' name='score[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br><br>
            <hr>
            ";
        }
        echo "<button type='submit'>Submit Scores</button>";
        echo '</form></div>';
    }

    // If the names and scores have been submitted, process them
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["score"])) {
        $names = $_POST["name"];
        $scores = $_POST["score"];
        
        $student_scores = [];

        // Store the names and scores in an associative array
        for ($i = 0; $i < count($names); $i++) {
            $student_scores[$names[$i]] = (float) $scores[$i];  
        }

        // Display the results
        echo '<div class="results">';
        echo "<h3>Student Data:</h3>";
        foreach ($student_scores as $name => $score) {
            echo "Name: " . $name . " | Score: " . $score . "<br>";
        }

        // Calculate highest score
        $highest_score = max($student_scores);
        $highest_scoring_student = array_search($highest_score, $student_scores);
        echo "<p><strong>" . $highest_scoring_student . "</strong> scored the highest with the score " . $highest_score . "</p>";

        // Calculate lowest score
        $lowest_score = min($student_scores);
        $lowest_scoring_student = array_search($lowest_score, $student_scores);
        echo "<p><strong>" . $lowest_scoring_student . "</strong> scored the lowest with the score " . $lowest_score . "</p>";

        // Calculate average score
        $average = array_sum($student_scores) / count($student_scores);
        echo "<p><strong>The average score is: " . round($average, 2) . "</strong></p>";
        

        // count for students with score above average
        $count = 0;
        foreach ($student_scores as $name => $score) {
            if ($score > $average){
                $count++;
            }
        }
        echo "<p><strong>Number of students with score above average are: " . $count . "</strong></p>";
        echo '</div>';
    }
    ?>

</div>

</body>
</html>

<script>
function validate_score(input) {
    
    const value = input.value;
    if (value % 0.5 !== 0) {
        
        input.setCustomValidity("Score must be in .5 or real value");
    } else {
        
        input.setCustomValidity("");
    }
}
</script>
