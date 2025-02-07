<?php
include('./pagination2.php');
function  search_student_report()
{
    echo '
        <form method="post">
        <input type="text" name="student_report_name" placeholder="Search for student report" onchange="validate_name()">
        <button type="submit" name="student_report_name_button">Submit</button>
        </form>
        ';
}

function generate_form_by_students_by_user_input($stds_number)
{
    echo '<div class="form-section"><form method="post">';
    for ($i = 0; $i < $stds_number; $i++) {
        echo "
        <label>Id : " . ($i + 1) . " </label>
        <label>Name of Student :</label>
        <input type='text' name='name[]' maxlength='30' required onchange='validate_name(this)'><br>
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

function generate_form_by_students_by_file($num_of_students, $file_path)
{
    // Open the uploaded file
    $csv_file = fopen($file_path, "r");

    // Skip the header row (if any)
    fgetcsv($csv_file);

    echo '<div class="form-section"><form method="post">';
    for ($i = 0; $i < $num_of_students; $i++) {
        $row = fgetcsv($csv_file);
        if ($row !== false) {
            $name = $row[0]; // Assuming the first column is the name
            $science = $row[1];
            $math = $row[2];
            $english = $row[3];
            $computer = $row[4];
            $social = $row[5];
            echo "
            <label>Id : " . ($i + 1) . " </label>
            <label>Name of Student " . ($i + 1) . ":</label>
            <input type='text' name='name[$i]' value='$name' required readonly><br>
            <label>Science score " . ($i + 1) . ":</label>
            <input type='number' name='science[$i]' value='$science' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <label>Math score " . ($i + 1) . ":</label>
            <input type='number' name='math[$i]' value='$math' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <label>English score " . ($i + 1) . ":</label>
            <input type='number' name='english[$i]' value='$english' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <label>Computer score " . ($i + 1) . ":</label>
            <input type='number' name='computer[$i]' value='$computer' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <label>Social score " . ($i + 1) . ":</label>
            <input type='number' name='social[$i]' value='$social' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
            <hr>
            ";
        }
    }
    fclose($csv_file);
    echo "<button type='submit'>Submit Scores</button>";
    echo '</form></div>';
}


function report_table(string $name, array $student_data, array $highest_marks)
{
    echo "<h3>Report for $_SESSION[search_name] </h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 50%; text-align: center;'>";
    echo "<tr style='background-color: #f2f2f2;'>
            <th>Subject</th>
            <th>Marks</th>
            <th>Highest Marks</th>
            </tr>";
    echo "<tr><td>Science</td><td>{$student_data['science']}</td><td>{$highest_marks['science']}</td></tr>";
    echo "<tr><td>Math</td><td>{$student_data['math']}</td><td>{$highest_marks['math']}</td></tr>";
    echo "<tr><td>English</td><td>{$student_data['english']}</td><td>{$highest_marks['english']}</td></tr>";
    echo "<tr><td>Computer</td><td>{$student_data['computer']}</td><td>{$highest_marks['computer']}</td></tr>";
    echo "<tr><td>Social</td><td>{$student_data['social']}</td><td>{$highest_marks['social']}</td></tr>";
    echo "<tr style='background-color: #d9edf7; font-weight: bold;'>
            <td>Percentage</td>
            <td colspan='2'>{$student_data['percentage']}%</td>
            </tr>";
    echo "</table>";

    $_SESSION['report'] =
    "<h3>Report for $_SESSION[search_name] </h3>
     <table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 50%; text-align: center;'>
     <tr style='background-color: #f2f2f2;'>
            <th>Subject</th>
            <th>Marks</th>
            <th>Highest Marks</th>
            </tr>
     <tr><td>Science</td><td>{$student_data['science']}</td><td>{$highest_marks['science']}</td></tr>
     <tr><td>Math</td><td>{$student_data['math']}</td><td>{$highest_marks['math']}</td></tr>
     <tr><td>English</td><td>{$student_data['english']}</td><td>{$highest_marks['english']}</td></tr>
     <tr><td>Computer</td><td>{$student_data['computer']}</td><td>{$highest_marks['computer']}</td></tr>
     <tr><td>Social</td><td>{$student_data['social']}</td><td>{$highest_marks['social']}</td></tr>
     <tr style='background-color: #d9edf7; font-weight: bold;'>
            <td>Percentage</td>
            <td colspan='2'>{$student_data['percentage']}%</td>
            </tr>
     </table>
    ";

}


function send_email_form(){
    echo '
    <form method="post" style="text-align:center">
    Parent Name: <br>
            <input type="text" name="parent_name" ><br>
            Email : <br>
            <input type="text" name="parent_email"><br><br>
        <button type="submit" name="email_button" value="Send mail" style="background-color:black">Send Mail</button>
    </form>
    ';
    echo '<hr>';

}

// function generate_form_by_students_by_file($num_of_students, $file_path)
// {
//     // Open the uploaded file
//     $csv_file = fopen($file_path, "r");

//     fgetcsv($csv_file); // Skip the header

//     $i = 0;
//     $csv_with_index = [];
//     while (($row = fgetcsv($csv_file)) !== false) {
//         $csv_with_index[$i] = $row;
//         $i++;
//     }

//     $no_of_records = count($csv_with_index);
//     pagination_form($no_of_records);
//     // echo '<div class="form-section"><form method="post">';
//     // for ($i = $_SESSION['start_item']; $i < $num_of_students; $i++) {
//     //     $row = fgetcsv($csv_file);
//     //     if ($row !== false) {
//     //         $name = $row[0]; // Assuming the first column is the name
//     //         $science = $row[1];
//     //         $math = $row[2];
//     //         $english = $row[3];
//     //         $computer = $row[4];
//     //         $social = $row[5];
//     //         echo "
//     //         <label>Id : " . ($i + 1) . " </label>
//     //         <label>Name of Student " . ($i + 1) . ":</label>
//     //         <input type='text' name='name[$i]' value='$name' required readonly><br>
//     //         <label>Science score " . ($i + 1) . ":</label>
//     //         <input type='number' name='science[$i]' value='$science' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
//     //         <label>Math score " . ($i + 1) . ":</label>
//     //         <input type='number' name='math[$i]' value='$math' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
//     //         <label>English score " . ($i + 1) . ":</label>
//     //         <input type='number' name='english[$i]' value='$english' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
//     //         <label>Computer score " . ($i + 1) . ":</label>
//     //         <input type='number' name='computer[$i]' value='$computer' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
//     //         <label>Social score " . ($i + 1) . ":</label>
//     //         <input type='number' name='social[$i]' value='$social' max='100' min='0' step='0.1' required onchange='validate_score(this)' readonly><br><br>
//     //         <hr>
//     //         ";
//     //     }
//     // }
//     // fclose($csv_file);
//     // echo "<button type='submit'>Submit Scores</button>";
//     // echo '</form></div>';
// }


?>