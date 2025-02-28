<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PrincipalHomePage.css" />
    <title>Principal Home Page</title>
    <script>
        function loadClassManagement() {
            
            document.getElementById('content-frame').src = './ClassManagement.php';

            document.getElementById('head-line').innerHTML = 'Class Management';
        }

        function loadProfile() {
            document.getElementById('content-frame').src = './Profile.php';

            document.getElementById('head-line').innerHTML = 'Profile';
        }

        function loadTeacherManagement(){
            
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
                    <li>Dashboard</li>
                    <li onclick="loadClassManagement()" style="cursor:pointer;">Classes</li>
                    <li onclick="loadTeacherManagement()" style="cursor:pointer;">Teachers</li>
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
            <iframe id="content-frame" src="" width="100%" height="500px" style="border:none; overflow-y: hidden;"></iframe>
        </div>

    </div>    
</body>
</html>
