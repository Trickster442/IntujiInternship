<?php
use Autodesk\Config\Config;
require_once __DIR__ . '/../Config/config.php';

$connection = new Config();
$conn = $connection->getConnection();

header("Content-Type: application/json");

if (!isset($conn)) {
    echo json_encode(["error" => "Database connection not found"]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            echo json_encode($data ?: ["message" => "User not found"]);
        } else {
            $result = $conn->query("SELECT * FROM users");
            $users = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($users);
        }
        break;

    case 'POST':
        if (!isset($input['name'], $input['email'], $input['age'])) {
            echo json_encode(["error" => "Missing required fields"]);
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $input['name'], $input['email'], $input['age']);
        $stmt->execute();
        echo json_encode(["message" => "User added successfully", "id" => $stmt->insert_id]);
        break;

    case 'PUT':
        if (!isset($_GET['id'], $input['name'], $input['email'], $input['age'])) {
            echo json_encode(["error" => "Missing required fields"]);
            exit;
        }
        $id = intval($_GET['id']);
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, age=? WHERE id=?");
        $stmt->bind_param("ssii", $input['name'], $input['email'], $input['age'], $id);
        $stmt->execute();
        echo json_encode(["message" => "User updated successfully"]);
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            echo json_encode(["error" => "Missing user ID"]);
            exit;
        }
        $id = intval($_GET['id']);
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo json_encode(["message" => "User deleted successfully"]);
        break;

    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}

// Close the connection
$conn->close();
?>
