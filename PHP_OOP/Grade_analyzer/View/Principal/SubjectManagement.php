<?php
include('./import.php');
include('./authorization.php');

echo '<a href="./AddSubject.php"><button style="width:150px; height: 30px; background-color:#4CAF50; color:white; border:none; border-radius:30px; cursor:pointer;">Add Subject</button></a>';

$connection = $config->getConnection();

$query = "SELECT * FROM subjects ";

$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);

if (!empty($result)) {
    $count = 0;

    echo '<style>
            body {
                background: linear-gradient(to bottom, #1a1a1a 0%, #2d2d2d 100%); /* Dark gradient */
                color: #ffffff; 
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
                font-size: 1.2rem;
            }
            tr {
                background-color: rgba(40, 40, 40, 0.95); /* Darker row background */
                color: #ffffff; 
                transition: all 0.3s ease;
            }
            tr:hover {
                background-color: rgba(162, 207, 254, 0.7); /* Light sky blue on hover */
                color: white; 
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
            <th>Subject Name</th>
            <th>Class ID</th>    
            <th>Delete</th>
        </tr>';

    foreach ($result as $data) {
        $count++;
        
        echo '<tr id="' . $data['id'] . '">
                <td>' . $count . '</td>
                <td>' . htmlspecialchars($data['subject_name']) . '</td>
                <td>' . htmlspecialchars($data['class_id']) . '</td>
                <td>
                <form method="post">
                    <input name="id" value="' . $data['id'] . '" type="hidden" />
                    <button name="delete" type="submit">Delete</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}

// DELETE
if (isset($_POST['delete'])) {
    $formHand->deleteSubject($_POST['id']);
}
