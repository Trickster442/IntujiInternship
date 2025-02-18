<?php
use Grade_analyzer\View\FormHolder;
include './View/FormHolder.php';
include './Controller/FormHandling.php';
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
            <label for="num_of_students" class="font-semibold block mb-2">Enter the number of students:</label>
            <input
                class="w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
                type="number" name="num_of_students" id="num_of_students" value="<?php echo $num_of_students ?>"
                max="150" min="0">
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
class Main
{
    public function main()
    {
        $num_of_students = 0;
        $num_of_records = 0;
        $try = new FormHolder;
        $formHand = new FormHandling;
        if (isset($_GET['num_of_students']) || isset($_GET['file_upload'])) {
            if (isset($_GET['num_of_students']) && empty($_GET['file_upload'])) {
                $num_of_students = $_GET['num_of_students'];
                $try->grade_form_by_input($num_of_students);
                if (isset($_POST['name']) && isset($_POST['science'])) {
                    $data_values = $formHand->get_score();
                    var_dump($data_values);
                }
            }

            if (isset($_GET['file_upload'])) {
                // for file handling
                 
            }
        }
    }
}

$try = new Main;
$try->main();
