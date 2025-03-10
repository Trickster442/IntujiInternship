<?php
include('./import.php');

echo '<a href="../RegisterTeacher.php"><button style="width:100px; height: 30px; background-color:#4CAF50; color:black; border:1px solid black; border-radius:30px; cursor:pointer;">Add Teacher</button></a>';

$connection = $config->getConnection();

$query = "SELECT t.id , t.first_name, t.last_name, t.phone_num, t.role, t.status, t.email, t.password, c.class, s.subject_name 
          FROM teachers t
          LEFT JOIN classes c ON t.class_id = c.id 
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
            <th>EDIT</th>
        </tr>';

    foreach ($result as $data) {
        $count++;

        $teacher_name = $data['first_name'] . ' ' . $data['last_name'];

        echo '<tr id="' . $data['id']. '">
                <td>' . $count . '</td>
                <td>' . $teacher_name . '</td>
                <td>' . $data['phone_num'] . '</td>
                <td>' . $data['role'] . '</td>
                <td>' . $data['status'] . '</td>
                <td>' . $data['class'] . '</td>
                <td>' . $data['subject_name'] . '</td>
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
    echo "<p style='color:white;'>No records found.</p>";
}
