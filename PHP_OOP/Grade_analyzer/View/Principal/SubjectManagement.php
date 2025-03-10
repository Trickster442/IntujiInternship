<?php
include('./import.php');
include('./authorization.php');

echo '<a href="./AddSubject.php"><button style="width:100px; height: 30px; background-color:#4CAF50; color:black; border:1px solid black; border-radius:30px; cursor:pointer;">Add Subject</button></a>';

$connection = $config->getConnection();

$query = "SELECT * FROM subjects ";

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
                background-color: rgb(150, 158, 206);
                font-size: 1.2rem;
            }

            tr {
                background-color: #f9f9f9;
                color:black;
            }

            tr:hover {
                background-color: rgb(150, 158, 206);
                color:white;
            }

            td a {
                text-decoration: none;
                color: #007BFF;
            }

                
        </style>';

    echo '<table>';
    echo '<tr>
            <th>S.N</th>
            <th>Subject Name</th>
            <th>Class ID</th>
            <th>Edit</th>      
            <th>Delete</th>
        </tr>';

    foreach ($result as $data) {
        $count++;
        
        echo '<tr id="' . $data['id']. '">
                <td>' . $count . '</td>
                <td>' . $data['subject_name'] . '</td>
                <td>' . $data['class_id'] . '</td>
                <td>
                <form method="post" action="#">
                    <input name="id" value=' . $data['id'] . ' type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
                <td>
                <form method="post">
                    <input name="id" value=' . $data['id'] . ' type="hidden" />
                    <button name="delete" type="submit">Delete</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}

//DELETE
if(isset($_POST['delete'])){
    $formHand->deleteSubject($_POST['id']);
}