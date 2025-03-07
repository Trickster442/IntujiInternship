<?php
session_start();

include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'ClassTeacher') {
    header('Location: ../TeacherLogin.php');
    exit(); 
}
$class_id = $_SESSION['class_id']
?>


<?php
use Grade_analyzer\Config\Config;
use Grade_analyzer\Controller\FormHandling;
require_once '../../Config/Config.php';
require_once '../../Controller/FormHandling.php';


$config = new Config();
$connection = $config->getConnection();

$formHand = new FormHandling($config);

$result = $formHand->getStudentByClass($class_id);


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

