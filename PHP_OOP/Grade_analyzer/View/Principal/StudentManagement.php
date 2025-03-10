<?php
include('./import.php');

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="studentManagement.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="./RegisterStudent.php" class="add-btn">Add Student</a>
        </div>
        <div class="cards-container">';

$connection = $config->getConnection();

$query = "SELECT c.class, s.first_name, s.last_name, s.roll_no, s.phone_num, s.id
          FROM classes c 
          RIGHT JOIN students s ON c.id = s.class_id 
          ";

$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);

if (!empty($result)) {
    $count = 0;

    foreach ($result as $data) {
        $count++;
        echo '<div class="card" id="' . $data['id'] . '">
                <div class="card-header">Student #' . $count . '</div>
                <div class="card-content">
                    <div class="card-field">
                        <label>Name:</label>
                        <span>' . $data['first_name'] . ' ' . $data['last_name'] . '</span>
                    </div>
                    <div class="card-field">
                        <label>Roll:</label>
                        <span>' . $data['roll_no'] . '</span>
                    </div>
                    <div class="card-field">
                        <label>Phone:</label>
                        <span>' . $data['phone_num'] . '</span>
                    </div>
                    <div class="card-field">
                        <label>Class:</label>
                        <span>' . $data['class'] . '</span>
                    </div>
                </div>
                <div class="card-actions">
                    <form method="post" action="./UpdateStudent.php">
                        <input name="id" value="' . $data['id'] . '" type="hidden" />
                        <button type="submit">Edit</button>
                    </form>
                    <form method="post">
                        <input name="id" value="' . $data['id'] . '" type="hidden" />
                        <button name="delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>';
    }
} else {
    echo '<p class="no-records">No records found.</p>';
}

echo '    </div>
    </div>
</body>
</html>';

if(isset($_POST['delete'])){
    $formHand->deleteStudent($_POST['id']);
}