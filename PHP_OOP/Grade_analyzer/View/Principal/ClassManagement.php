<?php declare(strict_types=1);
include('./authorization.php');
include('./import.php');

$connection = $config->getConnection();

$query = "SELECT c.class, c.id AS class_id, t.first_name, t.last_name 
          FROM classes c 
          LEFT JOIN teachers t ON c.id = t.class_id 
          AND t.role = 'ClassTeacher' ";

$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);

// DELETE
if (isset($_POST['delete'])) {
    $formHand->deleteClass($_POST['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
    <link rel="stylesheet" href="classManagement.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="./AddClass.php" class="add-btn">Add Class</a>
        </div>

        <?php if (!empty($result)): ?>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Class</th>
                    <th>Class Teacher</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $count = 0;
                foreach ($result as $data):
                    $count++;
                    $teacher_name = (!empty($data['first_name']) && !empty($data['last_name']))
                        ? htmlspecialchars($data['first_name'] . ' ' . $data['last_name'])
                        : 'Not declared';
                    ?>
                    <tr id="<?= $data['class_id'] ?>">
                        <td><?= $count ?></td>
                        <td><?= $data['class'] ?></td>
                        <td><?= $teacher_name ?></td>
                        <td>
                            <form method="post" action="./ClassUpdateForm.php">
                                <input name="id" value="<?= $data['class_id'] ?>" type="hidden" />
                                <button>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form method="post">
                                <input name="id" value="<?= $data['class_id'] ?>" type="hidden" />
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p class="no-records">No records found.</p>
        <?php endif; ?>
    </div>
</body>

</html>