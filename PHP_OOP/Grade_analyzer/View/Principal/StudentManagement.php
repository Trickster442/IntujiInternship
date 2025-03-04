<?php
use Grade_analyzer\Config\Config;

require_once '../../Config/Config.php';


echo '<a href="./RegisterStudent.php"><button style="width:100px; height: 30px; background-color:#4CAF50; color:black; border:1px solid black; border-radius:30px; cursor:pointer;">Add Student</button></a>';

$config = new Config();
$connection = $config->getConnection();

$query = "SELECT c.class, s.first_name, s.last_name, s.roll_no, s.phone_num, s.id
          FROM classes c 
          RIGHT JOIN students s ON c.id = s.class_id 
          ";

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
            <th>Name</th>
            <th>Roll</th>
            <th>Phone Num</th>
            <th>Class</th>
            <th>Edit</th>      
            <th>Delete</th>
        </tr>';

    foreach ($result as $data) {
        $count++;
        echo '<tr id="' . $data['id']. '">
                <td>' . $count . '</td>
                <td>' . $data['first_name'] . ' ' . $data['last_name']  . '</td>
                <td>' . $data['roll_no'] . '</td>
                <td>' . $data['phone_num'] . '</td>
                <td>' . $data['class'] . '</td>
                <td>
                <form method="post" action="#">
                    <input name="id" value=' . $data['id'] . ' type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
                <td>
                <form method="post" action="./AdminTeacherRegistration.php">
                    <input name="id" value=' . $data['id'] . ' type="hidden" />
                    <button>Delete</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}

