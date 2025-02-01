
<?php

function percentage_array(array $student_grades) : array {
    return array_column($student_grades, "percentage","name"); 
}

function count_highest_percentage(array $student_grades):string{
    $percentage_array = percentage_array($student_grades);
    $highest_percentage = max($percentage_array);

    // array with percentages and then search from highest
    $highest_scoring_student = array_search($highest_percentage, array_column($student_grades, "percentage"), true);
    
    // all array keys from the array
    $student_names = array_keys($student_grades); 

    // name of the student with highest score
    $highest_scoring_student = $student_names[$highest_scoring_student];

    echo "<p><strong>$highest_scoring_student</strong> scored the highest with a percentage of $highest_percentage%</p>";
    return $highest_scoring_student;

}

function count_lowest_percentage(array $student_grades): string{
    $percentage_array = percentage_array($student_grades);

    $lowest_percentage = min($percentage_array);

    $lowest_scoring_student = array_search($lowest_percentage, array_column($student_grades, "percentage"), true);

    $student_names = array_keys($student_grades);

    $lowest_scoring_student = $student_names[$lowest_scoring_student];

    echo "<p><strong>" . $lowest_scoring_student . "</strong> scored the lowest with the score " . $lowest_percentage . "</p>";
    return $lowest_scoring_student;
}

function calculate_average(array $student_grades): float{
    $percentage_array = percentage_array($student_grades);
    $average = array_sum($percentage_array) / count($student_grades);
    echo "<p><strong>The average score is: " . round($average, 2) . "</strong></p>";
    return $average;
}

function create_csv_file(array $student_grades, string $set_file_name){
    $csv_file = fopen($set_file_name . ".csv", "w");
    fputcsv($csv_file, ['Name', 'Science', 'Math', 'English', 'Computer', 'Social', 'Percentage']);
    foreach($student_grades as $name => $scores){
        
            fputcsv($csv_file, array_merge([$name], $scores));
            }
    fclose($csv_file);
}

function generate_form_by_students_by_user_input($stds_number){
    echo '<div class="form-section"><form method="post">';
    for ($i = 0; $i < $stds_number; $i++) {
        echo "
        <label>Id : ". ($i+1) ." </label>
        <label>Name of Student :</label>
        <input type='text' name='name[]' required><br>
        <label>Science score : </label>
        <input type='number' name='science[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br>
        <label>Math score : </label>
        <input type='number' name='math[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br>
        <label>English score : </label>
        <input type='number' name='english[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br><br>
        <label>Computer score : </label>
        <input type='number' name='computer[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br><br>
        <label>Social score : </label>
        <input type='number' name='social[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)'><br><br>
        <hr>
        ";
    }  
    echo '<label>Enter name for your file : </label>';
    echo '<input type="text" name="give_filename" maxlength="20" minlength="3"></input>';
    echo "<button type='submit' name='submit_scores'>Submit Scores</button>";
    echo '</form></div>';
}

function generate_form_by_students_by_file($num_of_students, $file_path) {
    // Open the uploaded file
    $csv_file = fopen($file_path, "r");

    // Skip the header row (if any)
    fgetcsv($csv_file);

    echo '<div class="form-section"><form method="post">';
    for ($i = 0; $i < $num_of_students; $i++) {
        $row = fgetcsv($csv_file);
        if ($row !== false) {
            $name = $row[0]; // Assuming the first column is the name
            $score = $row[1]; // Assuming the second column is the score
            echo "
            <label>Id : ". ($i+1) ." </label>
            <label>Name of Student " . ($i + 1) . ":</label>
            <input type='text' name='name[$i]' value='$name' required readonly><br>
            <label>Score of Student " . ($i + 1) . ":</label>
            <input type='number' name='score[$i]' value='$score' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <hr>
            ";
        }
    }
    fclose($csv_file);
    echo "<button type='submit'>Submit Scores</button>";
    echo '</form></div>';
}


?>