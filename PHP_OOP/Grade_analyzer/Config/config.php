<?php

use Grade_analyzer\Model\DatabaseModel;

include("../Model/DatabaseModel.php");

$servername = "mysql";  
$username = "root";
$password = "root";
$dbname = "grade_analyzer";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!<br>";


$model = new DatabaseModel();
$query1 = $model->studentInfoModel();
$query2 = $model->subjectMarksModel();

// student info table creation
if ($conn->query($query1) === TRUE) {
    echo "Student Info Table created successfully<br>";
} else {
    echo "Error creating Student Info table: " . $conn->error . "<br>";
}

// student subject marks table creation
if ($conn->query($query2) === TRUE) {
    echo "Student Marks Table created successfully<br>";
} else {
    echo "Error creating Student Marks table: " . $conn->error . "<br>";
}

// Close connection
$conn->close();

