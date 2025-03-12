<?php
include('authorization.php');
include('import.php');


if (!isset($_SESSION['class_id'])) {
    die("Error: Class ID is not set in session.");
}

$class_id = $_SESSION['class_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $marksData = $markHand->searchMarks($_POST['search'], $class_id);
    $_SESSION['dataByName'] = [];

    if (!empty($marksData)) {
        foreach ($marksData as $mark) {
            $studentName = $mark['first_name'] . ' ' . $mark['last_name'];
            $semester = $mark['semester'];

            if (!isset($_SESSION['dataByName'][$studentName])) {
                $_SESSION['dataByName'][$studentName] = [];
            }
            if (!isset($_SESSION['dataByName'][$studentName][$semester])) {
                $_SESSION['dataByName'][$studentName][$semester] = [];
            }
            $_SESSION['dataByName'][$studentName][$semester][$mark['subject_name']] = $mark['subject_marks'];
        }
    }
}

$dataByName = $_SESSION['dataByName'] ?? [];

$listVisible = !isset($_POST['result']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['result'])) {
    $selectedStudent = $_POST['result'];
    if (isset($_SESSION['dataByName'][$selectedStudent])) {
        $_SESSION['selectedStudentData'] = $_SESSION['dataByName'][$selectedStudent];
        unset($_SESSION['dataByName']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Marks</title>
    <link rel="stylesheet" href="SearchResult.css">
    <script>
        function hideList() {
            document.getElementById('name-list').style.display = 'none';
        }
    </script>
</head>

<body>

    <!-- First Form: Search -->
    <form method="post" class="search">
        <label for="search">Search :</label>
        <input type="text" name="search" required placeholder="Search for marks">
        <button type="submit">Submit</button>
    </form>

    <?php
    if (!empty($dataByName) && $listVisible) {
        echo "<ul id='name-list'>";
        echo "<form method='post' class='name-search' onsubmit='hideList()'>";
        foreach ($dataByName as $key => $value) {
            echo "<li>";
            echo "<button type='submit' name='result' value='$key'>$key</button>";
            echo "</li>";
        }
        echo "</form>";
        echo "</ul>";
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        echo "<p class='no-result'>No result found</p>";
    }

    if (!empty($_SESSION['selectedStudentData'])) {
        echo "<div class='report-container'>";
        echo "<h2>Result Report</h2>";

        foreach ($_SESSION['selectedStudentData'] as $semester => $subjects) {
            echo "<div class='semester-block'>";
            echo "<h3>Semester: $semester</h3>";
            echo "<table>";
            echo "<tr><th>Subject</th><th>Marks</th></tr>";

            foreach ($subjects as $subject => $marks) {
                echo "<tr><td>$subject</td><td>$marks</td></tr>";
            }

            echo "</table>";
            echo "</div>";
        }

        echo "</div>";
        unset($_SESSION['selectedStudentData']);

    }
    ?>

</body>

</html>