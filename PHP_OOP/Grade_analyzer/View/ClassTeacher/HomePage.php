<?php
session_start();

include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'ClassTeacher') {
    header('Location: ../TeacherLogin.php');
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HomePage.css" />
    <title>Home Page</title>
    <script>
        function loadProfile() {
            document.getElementById('content-frame').src = './Profile.php';

            document.getElementById('head-line').innerHTML = 'Profile';
        }

        function loadMarkManagement(){
            document.getElementById('content-frame').src = './MarksManagement.php';

        }

        function loadStudentManagement() {
            document.getElementById('content-frame').src = './StudentManagement.php';

            document.getElementById('head-line').innerHTML = 'Student Management';
        }
    </script>
</head>
<body>
    <div class="main-container">
        <div class="left-container">
            <div class="logo">
                <h1>LOGO</h1>
            </div>

            <div class="upper-navigation">
                <ul>
                    <li onclick="loadProfile()" style="cursor:pointer;">Profile</li>
                    <li onclick="loadStudentManagement()" style="cursor:pointer;">Students</li>
                    <li onclick="loadMarkManagement()" style="cursor:pointer;">Marks</li>
                </ul>
            </div>

            <div class="lower-navigation">
                <ul>
                    <li>Contact Support</li>
                    <li>Settings</li>
                    <li>Logout</li>
                </ul>
            </div>
        </div>

        <div class="right-container">
            <h1 id="head-line" style="text-align:center; "></h1>
            <iframe id="content-frame" src="" width="100%" height="500px" style="border:none; max-height: 400px;"></iframe>
        </div>

    </div>    
</body>
</html>

