<?php
include('./import.php');

echo '<a href="../RegisterTeacher.php"><button style="width:150px; height: 30px; background-color:#4CAF50; color:white; border:none; border-radius:30px; cursor:pointer;">Add Teacher</button></a>';

$connection = $config->getConnection();

$query = "SELECT t.id, t.first_name, t.last_name, t.phone_num, t.role, t.status, t.email, t.password, c.class, s.subject_name 
          FROM teachers t
          LEFT JOIN classes c ON t.class_id = c.id 
          LEFT JOIN subjects s ON t.subject_id = s.id
          WHERE NOT role = 'Principal' ";

$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);

if (!empty($result)) {
    $count = 0;

    echo '<style>
            body {
                background: linear-gradient(to bottom, #1a1a1a 0%, #2d2d2d 100%); /* Dark gradient */
                padding: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                background: rgba(40, 40, 40, 0.95); 
                border-radius: 8px;
                overflow: hidden;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #4CAF50; 
            }
            th {
                background-color: #4CAF50; 
                color: #ffffff; 
            }
            tr {
                background-color: rgba(40, 40, 40, 0.95); 
                color: #ffffff; /* White text */
                transition: all 0.3s ease;
            }
            tr:hover {
                background-color: rgba(162, 207, 254, 0.7); 
                color: white; /* White text on hover */
            }
            td a {
                text-decoration: none;
                color: #007BFF; 
            }
            td a:hover {
                color: #0056b3;
            }
            button {
                padding: 5px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: opacity 0.3s, box-shadow 0.3s;
                color: white;
                background: #ffb4a2; 
            }
            button:hover {
                opacity: 0.8;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
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
        $teacher_name = htmlspecialchars($data['first_name'] . ' ' . $data['last_name']);

        echo '<tr id="' . $data['id'] . '">
                <td>' . $count . '</td>
                <td>' . $teacher_name . '</td>
                <td>' . htmlspecialchars($data['phone_num']) . '</td>
                <td>' . htmlspecialchars($data['role']) . '</td>
                <td>' . htmlspecialchars($data['status']) . '</td>
                <td>' . htmlspecialchars($data['class']) . '</td>
                <td>' . htmlspecialchars($data['subject_name']) . '</td>
                <td>
                <form method="post" action="./AdminTeacherRegistration.php">
                    <input name="id" value="' . $data['id'] . '" type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}
