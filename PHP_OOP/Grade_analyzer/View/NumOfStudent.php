<?php
use Grade_analyzer\View\FormHolder;
use Grade_analyzer\Controller\FormHandling;
use Grade_analyzer\Config\Config;
require_once '../Controller/FormHandling.php';
require_once '../Config/Config.php';
include './FormHolder.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Score Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="bg-white w-9/12 my-10 mx-auto p-6 shadow-md rounded-md">
        <h1 class="text-3xl font-bold text-center mb-5">Enter Student Data</h1>
        <form method="GET">
            <label for="student_of_class" class="font-semibold block mb-2">Enter the Class:</label>
            <input
                class="w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
                type="number" name="student_of_class" id="student_of_class" value="<?php echo isset($_GET['student_of_class']) ? $_GET['student_of_class'] : '' ?>"
                max="10" min="0">
            <button type="submit" name="num_of_students_submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition mb-4">Submit</button>
        </form>

        <form>
            <input type="file" name="file_upload" class="w-full border border-gray-300 rounded-xl p-2 mb-4">
            <button type="submit" name="upload_file"
                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Upload</button>
        </form>
    </div>
</body>

</html>

<?php
$try = new FormHolder();
$config = new Config();
$formHand = new FormHandling($config);
if (isset($_GET['student_of_class']) || isset($_GET['file_upload'])) {
    if (isset($_GET['student_of_class']) && empty($_GET['file_upload'])) {
        // $student_class = $_GET['student_of_class'];
        // $get_data = $formHand -> num_of_students_by_class($student_class);

        // $try->grade_form_by_input($get_data);

        // if (isset($_POST['name']) && isset($_POST['science'])) {
        //     $data_values = $formHand->get_score();
        //     var_dump($data_values);
        // }
    }

    if (isset($_GET['file_upload'])) {
        // for file handling
         
    }
}


