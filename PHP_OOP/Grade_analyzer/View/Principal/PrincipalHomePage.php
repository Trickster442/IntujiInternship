<?php
session_start();

include '../../Controller/UserAuthenticate.php';

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'Principal') {
    header('Location: ../TeacherLogin.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PrincipalHomePage.css" />
    <title>Principal Home Page</title>
    <script>
        function loadPage(page, title) { 
            document.getElementById('content-frame').src = './' + page + '.php';
            document.getElementById('head-line').innerHTML = title;
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
                    <li onclick="loadPage('Profile', 'Profile')" style="cursor:pointer;">Profile</li>
                    <li onclick="loadPage('StudentManagement', 'Student Management')" style="cursor:pointer;">Students</li>
                    <li onclick="loadPage('ClassManagement', 'Class Management')" style="cursor:pointer;">Classes</li>
                    <li onclick="loadPage('TeacherManagement', 'Teacher Management')" style="cursor:pointer;">Teachers</li>
                    <li onclick="loadPage('SubjectManagement', 'Subject Management')" style="cursor:pointer;">Subjects</li>
                </ul>
            </div>

            <div class="lower-navigation">
                <ul>
                    <li>Contact Support</li>
                    <li>Settings</li>
                    <li onclick="window.location.href='../../Controller/Logout.php'" style="cursor:pointer;">Logout</li>
                </ul>
            </div>
            
        </div>

        <div class="right-container">
            <h1 id="head-line" style="text-align:center;"></h1>
            <iframe id="content-frame" src="" width="100%" height="500px" style="border:none; min-height: 500px;"></iframe>
        </div>

    </div>    
</body>
</html>
