<?php
include('authorization.php');
include('import.php');
$class_id = $_SESSION['class_id'];

$result = $formHand->getStudentByClass($class_id);

if (!empty($result)) {
    $count = 0;
    echo '<style>
            body {
                background: linear-gradient(to bottom, #1a1a1a 0%, #2d2d2d 100%); /* Dark gradient */
                color: #ffffff; /* White text for better contrast */
                padding: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                background: rgba(40, 40, 40, 0.95); /* Darker table background */
                border-radius: 8px;
                overflow: hidden;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #4CAF50; /* Green border */
            }
            th {
                background-color: #4CAF50; /* Green header */
                color: #ffffff; /* White text */
                font-size: 1.2rem;
            }
            tr:nth-child(even) {
                background-color: rgba(40, 40, 40, 0.95); /* Darker row background */
                color: #ffffff; /* White text */
            }
            tr:nth-child(even):hover {
                background-color: rgba(162, 207, 254, 0.7); /* Light sky blue on hover */
                color: white; /* White text on hover */
            }
            tr:nth-child(odd) {
                background-color: #4CAF50; /* Green for odd rows */
                color: white; /* White text */
            }
            tr:nth-child(odd):hover {
                background-color: rgba(162, 207, 254, 0.7); /* Light sky blue on hover */
                color: white; /* White text on hover */
            }
            tr:hover {
                background-color: rgba(162, 207, 254, 0.7); /* Light sky blue on hover */
                color: white; /* White text on hover */
            }
            td a {
                text-decoration: none;
                color: #007BFF; /* Blue link color */
            }
            td a:hover {
                color: #0056b3; /* Darker blue on hover */
            }
            button {
                padding: 5px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: opacity 0.3s, box-shadow 0.3s;
                color: white;
                background: #ffb4a2; /* Soft coral for Edit and Delete buttons */
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
            <th>Roll</th>
            <th>Phone Num</th>
            <th>Edit</th>      
            <th>Delete</th>
        </tr>';

    foreach ($result as $data) {
        $count++;
        echo '<tr id="' . $data['id'] . '">
                <td>' . $count . '</td>
                <td>' . htmlspecialchars($data['first_name'] . ' ' . $data['last_name']) . '</td>
                <td>' . htmlspecialchars($data['roll_no']) . '</td>
                <td>' . htmlspecialchars($data['phone_num']) . '</td>
                <td>
                <form method="post" action="#">
                    <input name="id" value="' . $data['id'] . '" type="hidden" />
                    <button>Edit</button>
                </form>
                </td>
                <td>
                <form method="post" action="#">
                    <input name="id" value="' . $data['id'] . '" type="hidden" />
                    <button>Delete</button>
                </form>
                </td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "<p style='color:white;'>No records found.</p>";
}
