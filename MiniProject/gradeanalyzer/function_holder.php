
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

function search_highest_marks(array $student_grades, string $subject_name): float{
    $subject_marks_array = array_column($student_grades, $subject_name);

    $highest_marks = max($subject_marks_array);
    
    return $highest_marks;
} 

function search_lowest_marks(array $student_grades, string $subject_name): float{
    $subject_marks_array = array_column($student_grades, $subject_name);
    $lowest_marks = min($subject_marks_array);

    return $lowest_marks;
} 

function search_marks_by_name(array $student_grades, string $student_name): array {
    if (array_key_exists($student_name, $student_grades)) {
        $student_marks = $student_grades[$student_name];
        unset($student_marks['percentage']);
        return $student_marks;
    }
    return []; 
}

function marks_for_students(array $scores , string $student_name){
    if (array_key_exists($student_name, $scores)) {
    $marks_in_subjects = $scores[$student_name];
    unset($marks_in_subjects['percentage']);

    $count_subjects = count($marks_in_subjects);
    $total_marks = array_sum($marks_in_subjects);
    $average_marks = round($total_marks / $count_subjects , 2);
    $subject_marks_less_than_average = [];

    foreach ($marks_in_subjects as $subject => $value) {
        if ($value < $average_marks) {
            $subject_marks_less_than_average[$subject] = $value;
        }
    }

    $_SESSION['recommendation'] = [];
    foreach($subject_marks_less_than_average as $subject => $value) {
        if ($average_marks - $value > 20){
            echo '<p style="color:red">' . 'You need to work on ' . '<b>' . $subject . '</b>' . '<br>' . '</p>';
            $_SESSION['recommendation'][] = '<p style="color:red">' . 'You need to work on ' . '<b>' . $subject . '</b>' . '<br>' . '</p>';
        }
    }
    }else {
        echo '<p style="color:red">'."Student not found" . '</p>';
    }
    
}
?>

<script>
function validate_score(input) {
    const value = input.value;
    if (value % 0.5 !== 0) {
        input.setCustomValidity("Score must be in .5 or real value");
    } else {
        input.setCustomValidity("");
    }
}

function validate_name(input){
    const name = input.value;
    if (name.match(/[!,@,#,$,%,^,&,*,/,[0-9]/g)){
        input.setCustomValidity("Input must be alphabet only")
    } else{
        input.setCustomValidity("");
    }
}
</script>