<?php
use Grade_analyzer\Config\Config;

require_once '../../Config/Config.php';

$config = new Config();
$connection = $config->getConnection();

$query = "SELECT * FROM students ";

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
                <td>
                <form method="post" action="./ClassUpdateForm.php">
                    <input name="id" value=' . $data['class_id'] . ' type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
                <td>
                <form method="post" action="./AdminTeacherRegistration.php">
                    <input name="id" value=' . $data['class_id'] . ' type="hidden" />
                    <button>Delete</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}

echo '<a href="./RegisterStudent.php"><button>Add Student</button></a>';
