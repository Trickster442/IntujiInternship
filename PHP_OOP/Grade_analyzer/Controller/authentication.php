<?php
use Grade_analyzer\Config\Config;
require_once '../Config/Config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$config = new Config();
$config->getConnection();

// Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM students WHERE email = ? AND password = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    if ($result) {
        echo "Successful login";
    } else {
        echo "No user found.";
    }
    
    $stmt->close();

$conn->close();
