<?php
session_start();

include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'Principal' || !isset($_SESSION['user_id'])) {
    header('Location: ../TeacherLogin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

use Grade_analyzer\Controller\FormHandling;
use Grade_analyzer\Config\Config;

include '../../Controller/FormHandling.php';
include '../../Config/Config.php';

$config = new Config();
$formHand = new FormHandling($config);
$user_data = $formHand->getUserByID($user_id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="Profile.css">
</head>

<body>
    <div class="main-container">

        <div class="profile-picture">
            <h1> <?php echo $user_data['first_name'][0] ?> </h1>
        </div>

        <div class="detail-container">
            Name: <?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?> <br>
            Phone Number: <?php echo $user_data['phone_num']; ?><br>
            Role: <?php echo $user_data['role']; ?> <br>
            Status: <?php echo $user_data['status']; ?> <br>
            Class: <?php echo ($user_data['class_id'] === null) ? 'Not Assigned' : $user_data['class_id']; ?> <br>
            Subject: <?php echo ($user_data['subject_id'] === null) ? 'Not Assigned' : $user_data['subject_id']; ?> <br>
            Email: <?php echo $user_data['email']; ?>
        </div>

    </div>

</body>

</html>