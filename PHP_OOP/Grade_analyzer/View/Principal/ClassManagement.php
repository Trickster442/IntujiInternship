<?php
use Grade_analyzer\Config\Config;

require_once '../../Config/Config.php';

$config = new Config();
$connection = $config->getConnection();

$query = "SELECT c.class, c.id AS class_id, t.FirstName, t.LastName 
          FROM class c 
          LEFT JOIN teachers t ON c.id = t.class_id 
          ORDER BY c.class ASC";

$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);


if (!empty($result)) {
    $count = 0;

    echo '<style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #4CBB17;
                font-size: 1.2rem;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
                color:black;
            }

            tr:nth-child(even):hover {
                background-color: #4CBB17;
                color:white;
            }
            tr:nth-child(odd) {
                background-color: #4CBB17;
                color:white;
            }
                tr:nth-child(odd):hover {
                background-color: #f1f1f1;
                color:black;
            }
                
            tr:hover {
                background-color: #f1f1f1;
            }

            td a {
                text-decoration: none;
                color: #007BFF;
            }
                
            td a:hover {
                color: #0056b3;
            }
        </style>';

    echo '<table>';
    echo '<tr>
            <th>S.N</th>
            <th>Class</th>
            <th>Class Teacher</th>
            <th>Edit</th>      
            <th>Delete</th>
        </tr>';

    foreach ($result as $data) {
        $count++;

        $teacher_name = (!empty($data['FirstName']) && !empty($data['LastName']))
            ? htmlspecialchars($data['FirstName'] . ' ' . $data['LastName'])
            : 'Not declared';

        echo '<tr id="' . $data['class_id']. '">
                <td>' . $count . '</td>
                <td>' . $data['class'] . '</td>
                <td>' . $teacher_name . '</td>
                <td><a href="edit.php?id=' . urlencode($data['class_id']) . '">EDIT</a></td>
                <td><a href="delete.php?id=' . urlencode($data['class_id']) . '">DELETE</a></td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p>No records found.</p>";
}
