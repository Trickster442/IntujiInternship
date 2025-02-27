<?php declare(strict_types=1);
use Grade_analyzer\Config\Config;

require_once ('../../Config/Config.php');

$config = new Config();
$connection = $config->getConnection();

$query = "SELECT * FROM class";

$stmt = $connection->query($query);
$result = $stmt->fetch_all();

if (count($result) > 0) {
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
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
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
    echo '<tr>';
        echo '
        <th>S.N</th>
        <th>Class</th>
        <th>Class Teacher</th>
        <th>Edit</th>      
        <th>Delete</th>
        ';
    echo '</tr>';
    foreach ($result as $data) {
        $count++;
        $teacher_name = '';
        if ($data[2] === '0'){
            $teacher_name = 'Not declared';
        }
        echo '
        <tr id="' . $data[0] . '">
            <td>' . $count . '</td>
            <td>' . $data[1] . '</td>
            <td>' . $teacher_name . '</td>
            <td><a href="edit.php?id=' . $data[0] . '">EDIT</a></td>
            <td><a href="delete.php?id=' . $data[0] . '">DELETE</a></td>
        </tr>
        ';
    }
    echo '</table>';
}
?>
