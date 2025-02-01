<?php declare(strict_types=1);
session_start();
include('./function_holder.php');
?>

<?php 
$num_of_students = 0;
$error_message = ''; 

// Check if the upload button was clicked
if (isset($_POST['upload_file'])) {
    if (isset($_FILES['file_upload'])) {
        $received_file = $_FILES['file_upload'];
        $received_file_name = $_FILES['file_upload']['name'];
        $received_file_extension = explode('.', $received_file_name);
        $received_file_actual_extension = end($received_file_extension);
        $received_file_tmp_name = $_FILES['file_upload']['tmp_name'];
        $_SESSION['file_name'] = $received_file_tmp_name;

        if ($received_file_actual_extension != 'csv') {
            $error_message = 'Upload only CSV files.';
        } else {
            $csv_file = fopen($received_file_tmp_name, "r");
            $count_records = 0;
            while (fgetcsv($csv_file) !== false) {
                $count_records++;
            }
            fclose($csv_file);
            $num_of_students = $count_records-1;
        }
    }
}

// Check if the submit button for the number of students was clicked
if (isset($_POST['num_of_students_submit'])) {
    $num_of_students = isset($_POST['num_of_students']) ? (int)$_POST['num_of_students'] : 0;
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
            <input type="number" name="num_of_students" id="num_of_students" value="<?php echo $num_of_students ?>" max="150" min="0">
            <button type="submit" name="num_of_students_submit">Submit</button>
            <input type="file" name="file_upload">
            <button type="submit" name="upload_file">Upload</button>
        </form>

        <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
    </div>

    <?php 
    // Generate the form based on the number of students
    if ($num_of_students > 0) {
        if (isset($_POST['num_of_students_submit'])) {
            // If the user submitted the number of students manually
            generate_form_by_students_by_user_input($num_of_students);
        } elseif (isset($_POST['upload_file'])) {
            // If the user uploaded a file
            generate_form_by_students_by_file($num_of_students, $_SESSION['file_name']);
            
        }
    }

    // If the names and scores have been submitted, analyze them
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["science"])) {
        $names = $_POST["name"];

        $sciences_marks = $_POST["science"];
        $math_marks = $_POST["math"];
        $english_marks = $_POST["english"];
        $computer_marks = $_POST["computer"];
        $social_marks = $_POST["social"];

        $student_scores = [];

        // Store in associative way
        for ($i = 0; $i < count($names); $i++) {
            $total = (float) $sciences_marks[$i] + (float) $math_marks[$i] + (float) $english_marks[$i] + (float) $computer_marks[$i] + (float) $social_marks[$i];
            $total_percentage = (float) ($total / 500) * 100;
            $student_scores[$names[$i]] = ['science' => (float) $sciences_marks[$i], 'math' => (float) $math_marks[$i], 'english' => (float) $english_marks[$i], 'computer' => (float) $computer_marks[$i], 'social' => (float) $social_marks[$i], 'percentage' => round($total_percentage,2)];  
        }

        // Display the results
        echo '<div class="results">';
        echo "<h3>Student Data:</h3>";
        

        // call highest score counting function
        $highest_percentage_student = count_highest_percentage($student_scores); 

        // // call lowest score counting function
        $lowest_percentage_student = count_lowest_percentage($student_scores);
        
        // call average calculating function
        $average = calculate_average($student_scores);
        

        // count for students with score above average
        $count = 0;
        foreach ($student_scores as $name => $score) {
            if ($score > $average){
                $count++;
            }
        }
        echo "<p><strong>Number of students with percentage above average are: " . $count . "</strong></p>";
        echo '</div>';

        if (isset($_POST['give_filename']) && !empty($_POST['give_filename'])) {
            $set_file_name = $_POST['give_filename'];
            create_csv_file($student_scores, $set_file_name);
        }

        // highest in all subjects
        $_SESSION['highest_marks'] = [];
        $subjects = ['science', 'math', 'english', 'computer', 'social'];
        foreach ($subjects as $subject) {
            $marks = search_highest_marks($student_scores, $subject);
            $_SESSION['highest_marks'][$subject] = $marks;
        }
        echo '<br>';
        // lowest in all subjects
        $_SESSION['lowest_marks'] = [];
        foreach ($subjects as $subject) {
            $marks = search_lowest_marks($student_scores, $subject);
            $_SESSION['lowest_marks'][$subject] = $marks;
        }

        // marks by name for topper
        $marks_for_topper = search_marks_by_name($student_scores, $highest_percentage_student);
        
        $topper_marks_match_lowest_marks = array_intersect_assoc($_SESSION['lowest_marks'],$marks_for_topper);
        if (count($topper_marks_match_lowest_marks) > 0) {
            foreach($topper_marks_match_lowest_marks as $key => $value) {
                echo 'Even though ' . $highest_percentage_student . ' has highest percentage, he has lowest marks in ' .  '<b>' .$key. '</b>' .'</br>'; 
            }
        }

        // marks by name for lowest percentage student
        $marks_for_lowest_student = search_marks_by_name($student_scores, $lowest_percentage_student);

        $lowest_student_marks_match_highest_marks = array_intersect_assoc($_SESSION['highest_marks'], $marks_for_lowest_student);
        if (count($lowest_student_marks_match_highest_marks) > 0){
            foreach($lowest_student_marks_match_highest_marks as $key => $value) {
                echo 'Even though ' . $lowest_percentage_student . ' has lowest percentage, he has highest marks in ' .  '<b>' .$key. '</b>' . '</br>'; 
            }
        }

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
function search_highest_marks(array $student_grades, string $subject_name): float{
    $subject_marks_array = array_column($student_grades, $subject_name);

    $highest_marks = max($subject_marks_array);
    
    return $highest_marks;
} 

function search_lowest_marks(array $student_grades, string $subject_name): float{
    $subject_marks_array = array_column($student_grades, $subject_name);

    $highest_marks = min($subject_marks_array);
    
    return $highest_marks;
} 

function search_marks_by_name(array $student_grades, string $student_name): array {
    if (array_key_exists($student_name, $student_grades)) {
        $student_marks = $student_grades[$student_name];
        unset($student_marks['percentage']);
        return $student_marks;
    }
    return []; 
}



?>