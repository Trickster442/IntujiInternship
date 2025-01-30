<?php declare(strict_types=1);?>

<?php 
$num_of_students = 0;
$error_message = ''; 
if (isset($_POST['num_of_students'])) {
    $num_of_students = isset($_POST['num_of_students']) ? $_POST['num_of_students'] : '';
}

if (isset($_POST['upload_file']) && isset( $_FILES['file_upload'] )){
    $received_file = $_FILES['file_upload'];
    $received_file_name = $_FILES['file_upload']['name'];
    $received_file_extension = explode('.', $received_file_name);
    $received_file_actual_extension = end($received_file_extension);
    $received_file_tmp_name = $_FILES['file_upload']['tmp_name'];
   
    $csv_file = fopen($received_file_tmp_name, "r");

    if ($received_file_actual_extension != 'csv'){
        $error_message = 'Upload only CSV files.';
    }
    
    $count_records = 0;
    while (fgetcsv($csv_file) !== false){
        $count_records++;
    }

    $num_of_students = isset($_FILES['file_upload']) ? $count_records : ' ';

}

?>



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

    <div class="form-section">
        <h1>Enter Student Data</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="num_of_students">Enter the number of students:</label>
            <input type="number" name="num_of_students" id="num_of_students" value="<?php echo $num_of_students ?>">
            <button type="submit">Submit</button>
            <input type="file" name="file_upload">
            <button type="submit" name="upload_file">Upload</button>
        </form>

        <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
    </div>

<?php 
    // Check if number of students has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["name"])) {
        $num_of_students = (int) $_POST["num_of_students"];
        echo "Number of students: " . $num_of_students . "<br>";

        echo '<div class="form-section"><form method="post">';
        for ($i = 0; $i < $num_of_students; $i++) {
            echo "
            <label>Id : ". ($i+1) ." </label>
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

    // If the names and scores have been submitted, analyze them
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["score"])) {
        $names = $_POST["name"];
        $scores = $_POST["score"];
        
        $student_scores = [];

        // Store in associative way
        for ($i = 0; $i < count($names); $i++) {
            $student_scores[$names[$i]] = (float) $scores[$i];  
        }

        // Display the results
        echo '<div class="results">';
        echo "<h3>Student Data:</h3>";
          
        create_csv_file($student_scores);

        // call highest score counting function
        count_highest($student_scores); 
        

        // call lowest score counting function
        count_lowest($student_scores);
        
        // call average calculating function
        $average = calculate_average($student_scores);
        


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


<?php
function count_highest(array $student_grades){
    $highest_score = max($student_grades);
    $highest_scoring_student = array_search($highest_score, $student_grades);
    echo "<p><strong>" . $highest_scoring_student . "</strong> scored the highest with the score " . $highest_score . "</p>";

};

function count_lowest(array $student_grades){
    $lowest_score = min($student_grades);
    $lowest_scoring_student = array_search($lowest_score, $student_grades);
    echo "<p><strong>" . $lowest_scoring_student . "</strong> scored the lowest with the score " . $lowest_score . "</p>";
}

function calculate_average(array $student_grades): float{
    $average = array_sum($student_grades) / count($student_grades);
    echo "<p><strong>The average score is: " . round($average, 2) . "</strong></p>";
    return $average;
}

function create_csv_file(array $student_grades){
    $csv_file = fopen("student_grade.csv","w");
    fputcsv($csv_file, ['Name' , 'Score']);
    foreach($student_grades as $name => $score){
        fputcsv($csv_file, [$name, $score]);
    }
    fclose($csv_file);
}


?>