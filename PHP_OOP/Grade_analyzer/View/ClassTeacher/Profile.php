<?php
include('./authorization.php');
include('./import.php');

$user_id = $_SESSION['user_id'];
$user_data = $formHand->getUserByID($user_id);

$subjectData = $formHand->getSubjectByID($user_data['subject_id']);
$classData = $formHand->getClassByID($user_data['class_id'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></title>
    <link rel="stylesheet" href="Profile.css">
</head>
<body>
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-picture">
                <span><?php echo strtoupper($user_data['first_name'][0]); ?></span>
            </div>
            <h2 class="user-name">
                <?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?>
            </h2>
            <span class="user-role"><?php echo $user_data['role']; ?></span>
        </div>

        <div class="profile-details">
            <div class="detail-item">
                <span class="label">Phone:</span>
                <span class="value"><?php echo $user_data['phone_num']; ?></span>
            </div>
            <div class="detail-item">
                <span class="label">Email:</span>
                <span class="value"><?php echo $user_data['email']; ?></span>
            </div>
            <div class="detail-item">
                <span class="label">Status:</span>
                <span class="value <?php echo strtolower($user_data['status']); ?>">
                    <?php echo $user_data['status']; ?>
                </span>
            </div>
            <div class="detail-item">
                <span class="label">Class:</span>
                <span class="value">
                    <?php echo ($classData['class'] === null) ? 'Not Assigned' : $classData['class']; ?>
                </span>
            </div>
            <div class="detail-item">
                <span class="label">Subject:</span>
                <span class="value">
                    <?php echo ($subjectData['subject_name'] === null) ? 'Not Assigned' : $subjectData['subject_name']; ?>
                </span>
            </div>
        </div>
    </div>
</body>
</html>