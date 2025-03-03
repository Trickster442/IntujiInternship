<?php
use Grade_analyzer\Config\Config;

require_once '../../Config/Config.php';


$config = new Config();
$connection = $config->getConnection();

$query = "SELECT t.id , t.FirstName, t.LastName, t.PhoneNum, t.role, t.status, t.email, t.password, c.class, s.SubjectName 
          FROM teachers t
          LEFT JOIN class c ON t.class_id = c.id 
          LEFT JOIN subjects s ON t.subject_id = s.id
          WHERE NOT role = 'Principal' ";

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
            <th>Phone Number</th>
            <th>Role</th>      
            <th>Status</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Email</th>
            <th>Password</th>
            <th>EDIT</th>
        </tr>';

    foreach ($result as $data) {
        $count++;

        $teacher_name = $data['FirstName'] . ' ' . $data['LastName'];

        echo '<tr id="' . $data['id']. '">
                <td>' . $count . '</td>
                <td>' . $teacher_name . '</td>
                <td>' . $data['PhoneNum'] . '</td>
                <td>' . $data['role'] . '</td>
                <td>' . $data['status'] . '</td>
                <td>' . $data['class'] . '</td>
                <td>' . $data['SubjectName'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['password'] . '</td>
                <td>
                <form method="post" action="./AdminTeacherRegistration.php">
                    <input name="id" value=' . $data['id'] . ' type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
            </tr>';

    }

    echo '</table>';
} else {
    echo "<p>No records found.</p>";
}
