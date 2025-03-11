<?php
include('./authorization.php');
include('./import.php');

if (!isset($_SESSION['class_id'])) {
    die("Error: Class ID is not set in session.");
}

$class_id = $_SESSION['class_id'];

$marks = $markHand->getMarksByClass($class_id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Management</title>
    <link rel="stylesheet" href="MarksManagement.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="./AddMarks.php" class="add-btn">Add Marks</a>
            <a href="./MarksSummarize.php" class="add-btn">Summarize</a>
            <a href="./AddClass.php" class="add-btn">Search</a>
        </div>
        <?php if (!empty($marks)): ?>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th>Marks</th>
                    <th>Edit</th>
                </tr>
                <?php
                $count = 0;
                foreach ($marks as $mark):
                    $count++;
                    ?>
                    <tr id="<?= $mark['id'] ?>">
                        <td><?= $count ?></td>
                        <td><?= $mark['first_name'] . ' ' . $mark['last_name'] ?></td>
                        <td><?= $mark['subject_name'] ?></td>
                        <td><?= $mark['semester'] ?></td>
                        <td><?= $mark['subject_marks'] ?></td>
                        <td>
                            <form method="post" action="./ClassUpdateForm.php">
                                <input name="id" value="<?= $data['class_id'] ?>" type="hidden" />
                                <button>Edit</button>
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