<?php
session_start();
include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'ClassTeacher') {
    header('Location: ../TeacherLogin.php');
    exit();
}

if (!isset($_SESSION['class_id'])) {
    die("Error: Class ID is not set in session.");
}

$class_id = $_SESSION['class_id'];

use Grade_analyzer\Config\Config;
use Grade_analyzer\Controller\FormHandling;
require_once '../../Config/Config.php';
require_once '../../Controller/FormHandling.php';

$config = new Config();
$connection = $config->getConnection();

$formHand = new FormHandling($config);

$result = $formHand->getStudentByClass($class_id);
$subjects = $formHand->getSubjectByClass($class_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MarksManagement.css">
    <title>Mark Management</title>
</head>

<body>
    <div class="main-container">
        <h2>Marking Students</h2>
        <form method="post" action="processMarks.php"> 
            <?php
            foreach ($result as $data) {

                echo '<h3>' . htmlspecialchars($data['first_name']) . ' ' . htmlspecialchars($data['last_name']) . '</h3>';
                echo '<input type="hidden" name="student_id[]" value="' . $data['id'] . '">';
                
                foreach ($subjects as $subject) {
                    echo '<label>' . htmlspecialchars($subject['subject_name']) . '</label>';
                    echo '<input type="hidden" name="subject_id[' . $data['id'] . '][]" value="' . $subject['id'] . '">';
                    echo '<input type="number" name="subject_mark[' . $data['id'] . '][]" max="100" min="1" step="0.01" required>';
                    echo '<br>';
                }
                echo '<hr>';
            }
            ?>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
