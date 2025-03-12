<?php
include('authorization.php');
include('import.php');

if (!isset($_SESSION['class_id'])) {
    die("Error: Class ID is not set in session.");
}

$class_id = $_SESSION['class_id'];
?>

<form method="post" class="search">
    <label for="search">Search :</label>
    <input type="text" name="search" required placeholder="Search for marks">
    <button type="submit">Submit</button>
</form>

<?php
require('./searchLogic.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="SearchResult.css">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($dataByName)) {
            echo '<ul>';
            foreach ($dataByName as $key => $value) {
                echo "<li>";
                echo "<form method='post' class='name-search'>";
                echo "<input type='submit' name='result' id='result' value= ' $key '>";
                echo "</form>";
                echo "</li>";
            }
            echo '</ul>';
        } else {
            echo "<p style='color:white;'> No result found </p>";
        }
    }


    ?>
</body>

</html>