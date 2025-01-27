<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Score Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .results {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .results h3 {
            margin-top: 0;
        }
        .results p {
            font-size: 16px;
        }
        .alert {
            color: #D8000C;
            background-color: #FFBABA;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- First form to input number of students -->
    <div class="form-section">
        <h1>Enter Student Data</h1>
        <form method="post">
            <label for="num_of_students">Enter the number of students:</label>
            <input type="number" name="num_of_students" id="num_of_students" required>
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
            <input type='text' name='name[{$i}]' required><br>
            <label>Score of Student " . ($i + 1) . ":</label>
            <input type='number' name='score[{$i}]' max='100' min='0' step='0.001' required><br><br>
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
